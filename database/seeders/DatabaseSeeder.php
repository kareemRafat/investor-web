<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'kareem',
            'email' => 'admin@admin.com',
            'password' => Hash::make(12345678),
            'phone' => '01065056616',
            'job_title' => 'lawyer',
            'birth_date' => '1990-05-15',
            'residence_country' => 'mansoura',
            'role' => UserRole::ADMIN,
        ]);

        $this->call(CostProfitRangeSeeder::class);
    }
}
