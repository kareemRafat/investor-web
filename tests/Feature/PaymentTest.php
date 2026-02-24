<?php

namespace Tests\Feature;

use App\Enums\PlanType;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Payments\Drivers\PayPalGateway;
use App\Services\Payments\PaymentManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Mockery;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_payment_page()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        Livewire::actingAs($user)
            ->test(\App\Livewire\Pages\Payment::class, ['plan' => 'monthly'])
            ->assertStatus(200)
            ->assertSee(__('pages.payment.title'));
    }

    /** @test */
    public function it_creates_paypal_order()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $mockGateway = Mockery::mock(PayPalGateway::class);
        $mockGateway->shouldReceive('createOrder')
            ->once()
            ->andReturn('PAYPAL-ORDER-123');

        $this->instance(PaymentManager::class, tap(Mockery::mock(PaymentManager::class), function ($mock) use ($mockGateway) {
            $mock->shouldReceive('driver')->with('paypal')->andReturn($mockGateway);
        }));

        Livewire::actingAs($user)
            ->test(\App\Livewire\Pages\Payment::class, ['plan' => 'monthly'])
            ->call('createPayPalOrder')
            ->assertReturned('PAYPAL-ORDER-123');
    }

    /** @test */
    public function it_captures_paypal_order_and_activates_subscription()
    {
        config(['paypal.currency' => 'USD']);
        $user = User::factory()->create(['email_verified_at' => now()]);

        $mockGateway = Mockery::mock(PayPalGateway::class);
        $mockGateway->shouldReceive('capturePayment')
            ->once()
            ->with('PAYPAL-ORDER-123')
            ->andReturn([
                'status' => 'completed',
                'transaction_id' => 'CAPTURE-ID-123',
                'payload' => [
                    'purchase_units' => [
                        [
                            'payments' => [
                                'captures' => [
                                    [
                                        'amount' => [
                                            'value' => '99.00',
                                            'currency_code' => 'USD',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

        $this->instance(PaymentManager::class, tap(Mockery::mock(PaymentManager::class), function ($mock) use ($mockGateway) {
            $mock->shouldReceive('driver')->with('paypal')->andReturn($mockGateway);
        }));

        Livewire::actingAs($user)
            ->test(\App\Livewire\Pages\Payment::class, ['plan' => 'monthly'])
            ->call('capturePayPalOrder', 'PAYPAL-ORDER-123')
            ->assertRedirect(route('main.profile'))
            ->assertSessionHas('subscription_success');

        $user->refresh();
        $this->assertEquals(PlanType::MONTHLY, $user->plan_type);
        $this->assertEquals(10, $user->contact_credits);

        $this->assertDatabaseHas('subscriptions', [
            'user_id' => $user->id,
            'plan_type' => PlanType::MONTHLY,
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'gateway' => 'paypal',
            'gateway_order_id' => 'PAYPAL-ORDER-123',
            'gateway_transaction_id' => 'CAPTURE-ID-123',
            'amount' => 99.00,
            'status' => 'completed',
        ]);
    }

    /** @test */
    public function it_prevents_duplicate_capture()
    {
        $user = User::factory()->create();

        // Create an existing transaction
        Transaction::factory()->create([
            'gateway_order_id' => 'PAYPAL-ORDER-123',
            'status' => 'completed',
        ]);

        Livewire::actingAs($user)
            ->test(\App\Livewire\Pages\Payment::class, ['plan' => 'monthly'])
            ->call('capturePayPalOrder', 'PAYPAL-ORDER-123')
            ->assertReturned(['status' => 'error', 'message' => __('pages.payment.error')]);
    }
}
