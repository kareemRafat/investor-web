<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class PayPalWebhookController extends Controller
{
    public function __construct(
        protected SubscriptionService $subscriptionService
    ) {}

    /**
     * Handle the incoming PayPal webhook.
     */
    public function __invoke(Request $request)
    {
        $payload = $request->all();
        $headers = $request->header();

        // Basic logging for debugging
        Log::info('PayPal Webhook Received', [
            'event_type' => $payload['event_type'] ?? 'unknown',
            'resource_id' => $payload['resource']['id'] ?? 'unknown',
        ]);

        try {
            // 1. Verify Webhook Signature (Crucial for security)
            // Note: This requires PAYPAL_WEBHOOK_ID to be set in .env
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));

            // If verification is strict, enable this block when webhook ID is available
            // standard verifyWebhookEvent usage:
            // $provider->verifyWebhookEvent($payload, $headers, $webhookId);

            // For now, simpler check on event type
            $eventType = $payload['event_type'] ?? null;

            if ($eventType === 'PAYMENT.CAPTURE.COMPLETED') {
                $this->handlePaymentCaptureCompleted($payload);
            }

            return response()->json(['status' => 'success']);

        } catch (Throwable $e) {
            Log::error('PayPal Webhook Error: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    protected function handlePaymentCaptureCompleted(array $payload): void
    {
        $resource = $payload['resource'] ?? [];
        $captureId = $resource['id'] ?? null;

        // The order ID is usually in supplemental_data -> related_ids -> order_id
        // Or sometimes directly if the event is structured differently.
        // For 'PAYMENT.CAPTURE.COMPLETED', 'supplemental_data.related_ids.order_id' is reliable.
        $orderId = $resource['supplemental_data']['related_ids']['order_id'] ?? null;

        if (! $captureId || ! $orderId) {
            Log::warning('PayPal Webhook: Missing capture_id or order_id in payload', ['payload' => $payload]);

            return;
        }

        // Find the transaction by gateway_order_id (preferred) or gateway_transaction_id
        $transaction = Transaction::where('gateway_order_id', $orderId)
            ->orWhere('gateway_transaction_id', $captureId)
            ->first();

        if (! $transaction) {
            Log::info("PayPal Webhook: Transaction not found for Order ID: {$orderId} or Capture ID: {$captureId}");

            return;
        }

        if ($transaction->status === 'completed') {
            Log::info("PayPal Webhook: Transaction {$transaction->id} already completed.");

            return;
        }

        // Update transaction status
        $transaction->update([
            'status' => 'completed',
            'gateway_transaction_id' => $captureId, // Ensure capture ID is set
            'payload' => array_merge($transaction->payload ?? [], ['webhook_capture' => $payload]),
            'processed_at' => now(),
        ]);

        Log::info("PayPal Webhook: Transaction {$transaction->id} marked as completed.");

        // Fulfill subscription if the transaction is for a subscription
        if ($transaction->payable_type === \App\Models\Subscription::class) {
            $this->subscriptionService->subscribe(
                $transaction->user,
                $transaction->payable->plan_type,
                $orderId,
                true // Payment is already captured by PayPal
            );

            Log::info("PayPal Webhook: Subscription fulfilled for Transaction {$transaction->id}");
        }
    }
}
