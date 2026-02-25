<?php

namespace App\Filament\Actions\TransactionActions;

use App\Enums\PlanType;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Notifications\SubscriptionActivatedNotification;
use App\Services\Payments\PaymentManager;
use App\Services\SubscriptionService;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerifyPayPalStatusAction
{
    public static function make(): Action
    {
        return Action::make('verifyPayPalStatus')
            ->label('التحقق من حالة PayPal')
            ->icon('heroicon-o-arrow-path')
            ->color('info')
            ->visible(fn (Transaction $record) => 
                $record->gateway === 'paypal' && 
                in_array($record->status, ['pending', 'processing', 'failed']) &&
                !empty($record->gateway_order_id)
            )
            ->action(function (Transaction $record, PaymentManager $paymentManager, SubscriptionService $subscriptionService) {
                try {
                    $orderId = $record->gateway_order_id;
                    $gateway = $paymentManager->driver('paypal');
                    
                    // 1. Get status from PayPal
                    $paypalStatus = $gateway->getPaymentStatus($orderId);
                    
                    if ($paypalStatus === 'completed') {
                        // 2. Finalize capture if it was approved but not captured (rare but possible)
                        // Or if it was already completed but our system didn't know.
                        
                        // Let's re-read full order details to get amount and transaction ID
                        $client = new \Srmklive\PayPal\Services\PayPal;
                        $client->setApiCredentials(config('paypal'));
                        $client->getAccessToken();
                        $orderData = $client->showOrderDetails($orderId);

                        $capturedAmount = $orderData['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? 0;
                        $capturedCurrency = $orderData['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? 'USD';
                        $transactionId = $orderData['purchase_units'][0]['payments']['captures'][0]['id'] ?? $orderId;

                        DB::transaction(function () use ($record, $orderData, $capturedAmount, $capturedCurrency, $transactionId, $subscriptionService) {
                            $user = $record->user;
                            
                            // Determine plan type from metadata or description if possible
                            // For now, let's try to infer from amount
                            $planType = match ((float)$capturedAmount) {
                                999.0 => PlanType::YEARLY,
                                99.0 => PlanType::MONTHLY,
                                default => null,
                            };

                            if (!$planType) {
                                throw new \Exception('Could not determine plan type from amount: ' . $capturedAmount);
                            }

                            // Update or Create subscription
                            $subscription = $subscriptionService->subscribe($user, $planType, $record->gateway_order_id, true);

                            // Update transaction
                            $record->update([
                                'payable_id' => $subscription->id,
                                'payable_type' => Subscription::class,
                                'gateway_transaction_id' => $transactionId,
                                'amount' => $capturedAmount,
                                'currency' => $capturedCurrency,
                                'status' => 'completed',
                                'payload' => $orderData,
                                'processed_at' => Carbon::now(),
                                'error_message' => null,
                            ]);

                            // Notify user
                            $user->notify(new SubscriptionActivatedNotification($planType->getLabel()));
                        });

                        Notification::make()
                            ->title('تم التحقق والتحصيل بنجاح')
                            ->body('تم العثور على المعاملة مكتملة في PayPal وتفعيل الاشتراك للمستخدم.')
                            ->success()
                            ->send();
                    } else {
                        // Update local status to match PayPal
                        $record->update([
                            'status' => $paypalStatus === 'approved' ? 'processing' : $paypalStatus,
                        ]);

                        Notification::make()
                            ->title('حالة PayPal الحالية: ' . $paypalStatus)
                            ->info()
                            ->send();
                    }
                } catch (\Exception $e) {
                    Log::error('VerifyPayPalStatusAction Failed: ' . $e->getMessage());
                    
                    Notification::make()
                        ->title('فشل التحقق')
                        ->body($e->getMessage())
                        ->danger()
                        ->send();
                }
            })
            ->requiresConfirmation()
            ->modalHeading('التحقق من حالة الطلب في PayPal')
            ->modalDescription('سيتم الاتصال بـ PayPal الآن للتحقق من الحالة الحالية لهذا الطلب وتحديث السجلات محلياً.')
            ->modalSubmitActionLabel('تحقق الآن');
    }
}
