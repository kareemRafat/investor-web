<?php

namespace Tests\Feature;

use App\Enums\PlanType;
use App\Enums\SubscriptionStatus;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class PayPalWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_payment_capture_completed_webhook()
    {
        Log::spy();

        $user = User::factory()->create([
            'plan_type' => PlanType::FREE,
            'contact_credits' => 0,
        ]);

        $subscription = Subscription::factory()->create([
            'user_id' => $user->id,
            'plan_type' => PlanType::MONTHLY,
            'status' => SubscriptionStatus::PENDING, // Assuming we have a pending status or similar
        ]);

        $orderId = 'PAYPAL-ORDER-123';
        $captureId = 'PAYPAL-CAPTURE-456';

        $transaction = Transaction::factory()->create([
            'user_id' => $user->id,
            'payable_id' => $subscription->id,
            'payable_type' => Subscription::class,
            'gateway_order_id' => $orderId,
            'status' => 'pending',
            'amount' => 99.00,
        ]);

        $payload = [
            'event_type' => 'PAYMENT.CAPTURE.COMPLETED',
            'resource' => [
                'id' => $captureId,
                'supplemental_data' => [
                    'related_ids' => [
                        'order_id' => $orderId,
                    ],
                ],
            ],
        ];

        $response = $this->postJson(route('webhooks.paypal'), $payload);

        $response->assertStatus(200);

        // Verify transaction was updated
        $transaction->refresh();
        $this->assertEquals('completed', $transaction->status);
        $this->assertEquals($captureId, $transaction->gateway_transaction_id);

        // Verify subscription was fulfilled (User updated)
        $user->refresh();
        $this->assertEquals(PlanType::MONTHLY, $user->plan_type);
        $this->assertEquals(10, $user->contact_credits);

        // Verify a new active subscription was created or updated
        $this->assertTrue($user->subscriptions()->where('status', SubscriptionStatus::ACTIVE)->exists());

        Log::shouldHaveReceived('info')->with("PayPal Webhook: Transaction {$transaction->id} marked as completed.");
        Log::shouldHaveReceived('info')->with("PayPal Webhook: Subscription fulfilled for Transaction {$transaction->id}");
    }
}
