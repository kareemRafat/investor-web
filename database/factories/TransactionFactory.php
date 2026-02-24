<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'payable_id' => Subscription::factory(),
            'payable_type' => Subscription::class,
            'gateway' => 'paypal',
            'gateway_order_id' => $this->faker->uuid(),
            'gateway_transaction_id' => $this->faker->uuid(),
            'amount' => 99.00,
            'currency' => 'USD',
            'status' => 'completed',
            'processed_at' => now(),
        ];
    }
}
