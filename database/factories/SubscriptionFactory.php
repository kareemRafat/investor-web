<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\PlanType;
use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'plan_type' => PlanType::MONTHLY,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'status' => SubscriptionStatus::ACTIVE,
        ];
    }

    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'ends_at' => now()->subDay(),
            'status' => SubscriptionStatus::ACTIVE,
        ]);
    }
}
