<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\IdeaStatus;
use App\Enums\ContactVisibility;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idea_field' => fake()->word(),
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(),
            'user_id' => User::factory(),
            'status' => IdeaStatus::APPROVED,
            'contact_visibility' => ContactVisibility::CLOSED,
        ];
    }
}
