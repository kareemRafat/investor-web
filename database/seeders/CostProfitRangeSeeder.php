<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CostProfitRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranges = [
            // One-time ranges
            [
                'type' => 'one-time',
                'min_value' => 1000,
                'max_value' => 5000,
                'label' => '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 6000,
                'max_value' => 10000,
                'label' => '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 51000,
                'max_value' => 100000,
                'label' => '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 101000,
                'max_value' => 250000,
                'label' => '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 1000000,
                'max_value' => 2000000,
                'label' => '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 2000000,
                'max_value' => 5000000,
                'label' => '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 50000000,
                'max_value' => 100000000,
                'label' => '$50 million to $100 million<br>(185m to 370m SAR)',
            ],

            // Annual ranges
            [
                'type' => 'annual',
                'min_value' => 11000,
                'max_value' => 20000,
                'label' => '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 21000,
                'max_value' => 50000,
                'label' => '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 251000,
                'max_value' => 500000,
                'label' => '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 501000,
                'max_value' => 1000000,
                'label' => '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 5000000,
                'max_value' => 10000000,
                'label' => '$5 million to $10 million<br>(18.5m to 37m SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 10000000,
                'max_value' => 50000000,
                'label' => '$10 million to $50 million<br>(37m to 185m SAR)',
            ],
            [
                'type' => 'annual',
                'min_value' => 100000001, // عشان "more than"
                'max_value' => null,
                'label' => 'More than $100 million<br>(More than 370m SAR)',
            ],
        ];

        DB::table('cost_profit_ranges')->insert($ranges);
    }
}
