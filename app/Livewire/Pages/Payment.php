<?php

namespace App\Livewire\Pages;

use App\Enums\PlanType;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Notifications\SubscriptionActivatedNotification;
use App\Services\Payments\PaymentManager;
use App\Services\SubscriptionService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Payment extends Component
{
    public $plan;

    public $errorMessage = '';

    public function mount($plan)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! in_array($plan, ['monthly', 'yearly'])) {
            return redirect()->route('main.pricing');
        }

        // Prevent upgrading if already on this plan
        $planType = PlanType::tryFrom($plan);
        if (Auth::user()->plan_type === $planType) {
            return redirect()->route('main.pricing');
        }

        $this->plan = $plan;
    }

    /**
     * Handle PayPal error from frontend.
     */
    public function handlePayPalError($errorData = null)
    {
        Log::error('PayPal Frontend Error', ['data' => $errorData]);
        $this->errorMessage = __('pages.payment.error');
    }

    /**
     * Handle PayPal cancel from frontend.
     */
    public function handlePayPalCancel()
    {
        $this->errorMessage = __('pages.payment.cancelled');
    }

    /**
     * Check if PayPal is configured.
     */
    public function getIsPayPalConfiguredProperty(): bool
    {
        return ! empty($this->payPalClientId);
    }

    /**
     * Get the PayPal Client ID based on the current mode.
     */
    public function getPayPalClientIdProperty(): string
    {
        $mode = config('paypal.mode', 'sandbox');
        $clientId = config("paypal.{$mode}.client_id");

        // Fallback to the generic client ID from config/payments.php if mode-specific is empty
        if (empty($clientId)) {
            $clientId = config('payments.paypal.client_id', '');
        }

        return $clientId;
    }

    /**
     * Create a PayPal order.
     */
    public function createPayPalOrder(PaymentManager $paymentManager)
    {
        $this->errorMessage = '';

        try {
            $planType = PlanType::from($this->plan);
            $amount = match ($planType) {
                PlanType::YEARLY => 999.0,
                PlanType::MONTHLY => 99.0,
                PlanType::FREE => 0.0,
            };

            $currency = config('paypal.currency', 'USD');

            $orderId = $paymentManager->driver('paypal')->createOrder($amount, $currency, [
                'description' => __('pages.pricing.plans').': '.$planType->getLabel(),
            ]);

            return $orderId;
        } catch (\Exception $e) {
            Log::error('PayPal Order Creation Failed: '.$e->getMessage());
            $this->errorMessage = __('pages.payment.error');

            return null;
        }
    }

    /**
     * Capture a PayPal order and activate subscription.
     */
    public function capturePayPalOrder(string $orderId, PaymentManager $paymentManager, SubscriptionService $subscriptionService)
    {
        $this->errorMessage = '';

        try {
            // 1. Validation: Check if this order was already processed
            $existingTransaction = Transaction::where('gateway_order_id', $orderId)
                ->where('status', 'completed')
                ->exists();

            if ($existingTransaction) {
                return ['status' => 'error', 'message' => __('pages.payment.error')];
            }

            $result = $paymentManager->driver('paypal')->capturePayment($orderId);

            if ($result['status'] === 'completed') {
                $planType = PlanType::from($this->plan);
                $user = Auth::user();

                // 2. Validation: Verify amount and currency from PayPal response
                $capturedAmount = $result['payload']['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? 0;
                $capturedCurrency = $result['payload']['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? '';

                $expectedAmount = match ($planType) {
                    PlanType::YEARLY => 999.0,
                    PlanType::MONTHLY => 99.0,
                    PlanType::FREE => 0.0,
                };
                $expectedCurrency = config('paypal.currency', 'USD');

                if ((float) $capturedAmount !== (float) $expectedAmount || $capturedCurrency !== $expectedCurrency) {
                    $this->recordFailedTransaction($user, $orderId, $result, 'Amount/Currency mismatch');

                    return ['status' => 'error', 'message' => __('pages.payment.error')];
                }

                return DB::transaction(function () use ($user, $planType, $result, $orderId, $subscriptionService) {
                    // Create the subscription
                    $subscription = $subscriptionService->subscribe($user, $planType, $orderId, true);

                    // Record the transaction
                    Transaction::create([
                        'user_id' => $user->id,
                        'payable_id' => $subscription->id,
                        'payable_type' => Subscription::class,
                        'gateway' => 'paypal',
                        'gateway_order_id' => $orderId,
                        'gateway_transaction_id' => $result['transaction_id'],
                        'amount' => $capturedAmount,
                        'currency' => $capturedCurrency,
                        'status' => 'completed',
                        'payload' => $result['payload'],
                        'processed_at' => Carbon::now(),
                    ]);

                    // Send notification
                    $user->notify(new SubscriptionActivatedNotification($planType->getLabel()));

                    session()->flash('subscription_success', __('pages.payment.success', ['plan' => $planType->getLabel()]));

                    return ['status' => 'success', 'redirect' => route('main.profile')];
                });
            } else {
                $user = Auth::user();
                $this->recordFailedTransaction($user, $orderId, $result, $result['error'] ?? 'Capture failed');
                $this->errorMessage = $result['error'] ?? __('pages.payment.error');

                return ['status' => 'error', 'message' => $this->errorMessage];
            }
        } catch (\Exception $e) {
            Log::error('PayPal Order Capture Failed: '.$e->getMessage());
            $this->errorMessage = __('pages.payment.error');

            return ['status' => 'error', 'message' => $this->errorMessage];
        }
    }

    /**
     * Record a failed transaction for debugging and auditing.
     */
    protected function recordFailedTransaction($user, $orderId, $result, $error)
    {
        Log::error('PayPal Payment Failed', [
            'user_id' => $user->id,
            'order_id' => $orderId,
            'error' => $error,
            'payload' => $result['payload'] ?? null,
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'payable_id' => 0, // No valid payable yet
            'payable_type' => Subscription::class,
            'gateway' => 'paypal',
            'gateway_order_id' => $orderId,
            'gateway_transaction_id' => $result['transaction_id'] ?? null,
            'amount' => 0,
            'status' => 'failed',
            'error_message' => $error,
            'payload' => $result['payload'] ?? null,
        ]);
    }

    public function render()
    {
        return view('livewire.pages.payment')
            ->title(__('pages.payment.title'));
    }
}
