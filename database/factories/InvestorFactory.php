<?php

namespace Database\Factories;

use App\Enums\ContactVisibility;
use App\Enums\InvestorStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'investor_field' => fake()->word(),
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(),
            'user_id' => User::factory(),
            'status' => InvestorStatus::APPROVED,
            'contact_visibility' => ContactVisibility::CLOSED,
        ];
    }
}
