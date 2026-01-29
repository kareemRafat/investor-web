<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Idea;
use App\Enums\UnlockMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactUnlockFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'unlockable_id' => Idea::factory(),
            'unlockable_type' => (new Idea())->getMorphClass(),
            'method' => UnlockMethod::CREDIT,
        ];
    }
}
