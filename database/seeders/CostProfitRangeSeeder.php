<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'label_en' => '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
                'label_ar' => 'من 1,000 إلى 5,000 دولار<br>(من 3,700 إلى 18,500 ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 6000,
                'max_value' => 10000,
                'label_en' => '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
                'label_ar' => 'من 6,000 إلى 10,000 دولار<br>(من 22,200 إلى 37,000 ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 51000,
                'max_value' => 100000,
                'label_en' => '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
                'label_ar' => 'من 51,000 إلى 100,000 دولار<br>(من 188,800 إلى 370,000 ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 101000,
                'max_value' => 250000,
                'label_en' => '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
                'label_ar' => 'من 101,000 إلى 250,000 دولار<br>(من 374,000 إلى 925,750 ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 1000000,
                'max_value' => 2000000,
                'label_en' => '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
                'label_ar' => 'من 1,000,000 إلى 2,000,000 دولار<br>(من 3.7 مليون إلى 7.4 مليون ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 2000000,
                'max_value' => 5000000,
                'label_en' => '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
                'label_ar' => 'من 2,000,000 إلى 5,000,000 دولار<br>(من 7.4 مليون إلى 18.5 مليون ريال)',
            ],
            [
                'type' => 'one-time',
                'min_value' => 50000000,
                'max_value' => 100000000,
                'label_en' => '$50 million to $100 million<br>(185m to 370m SAR)',
                'label_ar' => 'من 50,000,000 إلى 100,000,000 دولار<br>(من 185 مليون إلى 370 مليون ريال)',
            ],

            // Annual ranges
            [
                'type' => 'annual',
                'min_value' => 11000,
                'max_value' => 20000,
                'label_en' => '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
                'label_ar' => 'من 11,000 إلى 20,000 دولار<br>(من 40,700 إلى 74,000 ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 21000,
                'max_value' => 50000,
                'label_en' => '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
                'label_ar' => 'من 21,000 إلى 50,000 دولار<br>(من 77,700 إلى 185,000 ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 251000,
                'max_value' => 500000,
                'label_en' => '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
                'label_ar' => 'من 251,000 إلى 500,000 دولار<br>(من 929,450 إلى 1,851,500 ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 501000,
                'max_value' => 1000000,
                'label_en' => '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
                'label_ar' => 'من 501,000 إلى 1,000,000 دولار<br>(من 1,855,000 إلى 3,700,000 ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 5000000,
                'max_value' => 10000000,
                'label_en' => '$5 million to $10 million<br>(18.5m to 37m SAR)',
                'label_ar' => 'من 5,000,000 إلى 10,000,000 دولار<br>(من 18.5 مليون إلى 37 مليون ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 10000000,
                'max_value' => 50000000,
                'label_en' => '$10 million to $50 million<br>(37m to 185m SAR)',
                'label_ar' => 'من 10,000,000 إلى 50,000,000 دولار<br>(من 37 مليون إلى 185 مليون ريال)',
            ],
            [
                'type' => 'annual',
                'min_value' => 100000001, // عشان "more than"
                'max_value' => null,
                'label_en' => 'More than $100 million<br>(More than 370m SAR)',
                'label_ar' => 'أكثر من 100,000,000 دولار<br>(أكثر من 370 مليون ريال)',
            ],

            // money contribution
            [
                'min_value' => 1000,
                'max_value' => 5000,
                'label_en' => '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
                'label_ar' => 'من 1,000 إلى 5,000 دولار<br>(من 3,700 إلى 18,500 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 6000,
                'max_value' => 10000,
                'label_en' => '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
                'label_ar' => 'من 6,000 إلى 10,000 دولار<br>(من 22,200 إلى 37,000 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 51000,
                'max_value' => 100000,
                'label_en' => '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
                'label_ar' => 'من 51,000 إلى 100,000 دولار<br>(من 188,800 إلى 370,000 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 101000,
                'max_value' => 250000,
                'label_en' => '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
                'label_ar' => 'من 101,000 إلى 250,000 دولار<br>(من 374,000 إلى 925,750 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 1000000,
                'max_value' => 2000000,
                'label_en' => '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
                'label_ar' => 'من 1,000,000 إلى 2,000,000 دولار<br>(من 3.7 مليون إلى 7.4 مليون ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 2000000,
                'max_value' => 5000000,
                'label_en' => '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
                'label_ar' => 'من 2,000,000 إلى 5,000,000 دولار<br>(من 7.4 مليون إلى 18.5 مليون ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 50000000,
                'max_value' => 100000000,
                'label_en' => '$50 million to $100 million<br>(185m to 370m SAR)',
                'label_ar' => 'من 50,000,000 إلى 100,000,000 دولار<br>(من 185 مليون إلى 370 مليون ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 11000,
                'max_value' => 20000,
                'label_en' => '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
                'label_ar' => 'من 11,000 إلى 20,000 دولار<br>(من 40,700 إلى 74,000 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 21000,
                'max_value' => 50000,
                'label_en' => '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
                'label_ar' => 'من 21,000 إلى 50,000 دولار<br>(من 77,700 إلى 185,000 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 251000,
                'max_value' => 500000,
                'label_en' => '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
                'label_ar' => 'من 251,000 إلى 500,000 دولار<br>(من 929,450 إلى 1,851,500 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 501000,
                'max_value' => 1000000,
                'label_en' => '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
                'label_ar' => 'من 501,000 إلى 1,000,000 دولار<br>(من 1,855,000 إلى 3,700,000 ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 5000000,
                'max_value' => 10000000,
                'label_en' => '$5 million to $10 million<br>(18.5m to 37m SAR)',
                'label_ar' => 'من 5,000,000 إلى 10,000,000 دولار<br>(من 18.5 مليون إلى 37 مليون ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 10000000,
                'max_value' => 50000000,
                'label_en' => '$10 million to $50 million<br>(37m to 185m SAR)',
                'label_ar' => 'من 10,000,000 إلى 50,000,000 دولار<br>(من 37 مليون إلى 185 مليون ريال)',
                'type' => 'money_contribution',
            ],
            [
                'min_value' => 100000001,
                'max_value' => null,
                'label_en' => 'More than $100 million<br>(More than 370m SAR)',
                'label_ar' => 'أكثر من 100,000,000 دولار<br>(أكثر من 370 مليون ريال)',
                'type' => 'money_contribution',
            ],
        ];

        DB::table('cost_profit_ranges')->insert($ranges);
    }
}
