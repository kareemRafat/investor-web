<?php

namespace App\Enums;

enum CostProfitRange: int
{
    // One-time Costs/Profits
    case ONE_TIME_1K_5K = 1;
    case ONE_TIME_6K_10K = 2;
    case ONE_TIME_51K_100K = 3;
    case ONE_TIME_101K_250K = 4;
    case ONE_TIME_1M_2M = 5;
    case ONE_TIME_2M_5M = 6;
    case ONE_TIME_50M_100M = 7;

    // Annual Costs/Profits
    case ANNUAL_11K_20K = 8;
    case ANNUAL_21K_50K = 9;
    case ANNUAL_251K_500K = 10;
    case ANNUAL_501K_1M = 11;
    case ANNUAL_5M_10M = 12;
    case ANNUAL_10M_50M = 13;
    case ANNUAL_MORE_THAN_100M = 14;

    // Money Contributions (Investor)
    case CONTRIBUTION_1K_5K = 15;
    case CONTRIBUTION_6K_10K = 16;
    case CONTRIBUTION_51K_100K = 17;
    case CONTRIBUTION_101K_250K = 18;
    case CONTRIBUTION_1M_2M = 19;
    case CONTRIBUTION_2M_5M = 20;
    case CONTRIBUTION_50M_100M = 21;
    case CONTRIBUTION_11K_20K = 22;
    case CONTRIBUTION_21K_50K = 23;
    case CONTRIBUTION_251K_500K = 24;
    case CONTRIBUTION_501K_1M = 25;
    case CONTRIBUTION_5M_10M = 26;
    case CONTRIBUTION_10M_50M = 27;
    case CONTRIBUTION_MORE_THAN_100M = 28;

    public function type(): string
    {
        return match (true) {
            $this->value <= 7 => 'one-time',
            $this->value <= 14 => 'annual',
            default => 'money_contribution',
        };
    }

    public function label(): string
    {
        $locale = app()->getLocale();

        return match ($this) {
            self::ONE_TIME_1K_5K, self::CONTRIBUTION_1K_5K => $locale === 'ar' ? 'من 1,000 إلى 5,000 دولار<br>(من 3,700 إلى 18,500 ريال)' : '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
            self::ONE_TIME_6K_10K, self::CONTRIBUTION_6K_10K => $locale === 'ar' ? 'من 6,000 إلى 10,000 دولار<br>(من 22,200 إلى 37,000 ريال)' : '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
            self::ONE_TIME_51K_100K, self::CONTRIBUTION_51K_100K => $locale === 'ar' ? 'من 51,000 إلى 100,000 دولار<br>(من 188,800 إلى 370,000 ريال)' : '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
            self::ONE_TIME_101K_250K, self::CONTRIBUTION_101K_250K => $locale === 'ar' ? 'من 101,000 إلى 250,000 دولار<br>(من 374,000 إلى 925,750 ريال)' : '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
            self::ONE_TIME_1M_2M, self::CONTRIBUTION_1M_2M => $locale === 'ar' ? 'من 1,000,000 إلى 2,000,000 دولار<br>(من 3.7 مليون إلى 7.4 مليون ريال)' : '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
            self::ONE_TIME_2M_5M, self::CONTRIBUTION_2M_5M => $locale === 'ar' ? 'من 2,000,000 إلى 5,000,000 دولار<br>(من 7.4 مليون إلى 18.5 مليون ريال)' : '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
            self::ONE_TIME_50M_100M, self::CONTRIBUTION_50M_100M => $locale === 'ar' ? 'من 50,000,000 إلى 100,000,000 دولار<br>(من 185 مليون إلى 370 مليون ريال)' : '$50 million to $100 million<br>(185m to 370m SAR)',
            self::ANNUAL_11K_20K, self::CONTRIBUTION_11K_20K => $locale === 'ar' ? 'من 11,000 إلى 20,000 دولار<br>(من 40,700 إلى 74,000 ريال)' : '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
            self::ANNUAL_21K_50K, self::CONTRIBUTION_21K_50K => $locale === 'ar' ? 'من 21,000 إلى 50,000 دولار<br>(من 77,700 إلى 185,000 ريال)' : '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
            self::ANNUAL_251K_500K, self::CONTRIBUTION_251K_500K => $locale === 'ar' ? 'من 251,000 إلى 500,000 دولار<br>(من 929,450 إلى 1,851,500 ريال)' : '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
            self::ANNUAL_501K_1M, self::CONTRIBUTION_501K_1M => $locale === 'ar' ? 'من 501,000 إلى 1,000,000 دولار<br>(من 1,855,000 إلى 3,700,000 ريال)' : '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
            self::ANNUAL_5M_10M, self::CONTRIBUTION_5M_10M => $locale === 'ar' ? 'من 5,000,000 إلى 10,000,000 دولار<br>(من 18.5 مليون إلى 37 مليون ريال)' : '$5 million to $10 million<br>(18.5m to 37m SAR)',
            self::ANNUAL_10M_50M, self::CONTRIBUTION_10M_50M => $locale === 'ar' ? 'من 10,000,000 إلى 50,000,000 دولار<br>(من 37 مليون إلى 185 مليون ريال)' : '$10 million to $50 million<br>(37m to 185m SAR)',
            self::ANNUAL_MORE_THAN_100M, self::CONTRIBUTION_MORE_THAN_100M => $locale === 'ar' ? 'أكثر من 100,000,000 دولار<br>(أكثر من 370 مليون ريال)' : 'More than $100 million<br>(More than 370m SAR)',
        };
    }

    public function min(): int
    {
        return match ($this) {
            self::ONE_TIME_1K_5K, self::CONTRIBUTION_1K_5K => 1000,
            self::ONE_TIME_6K_10K, self::CONTRIBUTION_6K_10K => 6000,
            self::ONE_TIME_51K_100K, self::CONTRIBUTION_51K_100K => 51000,
            self::ONE_TIME_101K_250K, self::CONTRIBUTION_101K_250K => 101000,
            self::ONE_TIME_1M_2M, self::CONTRIBUTION_1M_2M => 1000000,
            self::ONE_TIME_2M_5M, self::CONTRIBUTION_2M_5M => 2000000,
            self::ONE_TIME_50M_100M, self::CONTRIBUTION_50M_100M => 50000000,
            self::ANNUAL_11K_20K, self::CONTRIBUTION_11K_20K => 11000,
            self::ANNUAL_21K_50K, self::CONTRIBUTION_21K_50K => 21000,
            self::ANNUAL_251K_500K, self::CONTRIBUTION_251K_500K => 251000,
            self::ANNUAL_501K_1M, self::CONTRIBUTION_501K_1M => 501000,
            self::ANNUAL_5M_10M, self::CONTRIBUTION_5M_10M => 5000000,
            self::ANNUAL_10M_50M, self::CONTRIBUTION_10M_50M => 10000000,
            self::ANNUAL_MORE_THAN_100M, self::CONTRIBUTION_MORE_THAN_100M => 100000001,
        };
    }

    public function max(): ?int
    {
        return match ($this) {
            self::ONE_TIME_1K_5K, self::CONTRIBUTION_1K_5K => 5000,
            self::ONE_TIME_6K_10K, self::CONTRIBUTION_6K_10K => 10000,
            self::ONE_TIME_51K_100K, self::CONTRIBUTION_51K_100K => 100000,
            self::ONE_TIME_101K_250K, self::CONTRIBUTION_101K_250K => 250000,
            self::ONE_TIME_1M_2M, self::CONTRIBUTION_1M_2M => 2000000,
            self::ONE_TIME_2M_5M, self::CONTRIBUTION_2M_5M => 5000000,
            self::ONE_TIME_50M_100M, self::CONTRIBUTION_50M_100M => 100000000,
            self::ANNUAL_11K_20K, self::CONTRIBUTION_11K_20K => 20000,
            self::ANNUAL_21K_50K, self::CONTRIBUTION_21K_50K => 50000,
            self::ANNUAL_251K_500K, self::CONTRIBUTION_251K_500K => 500000,
            self::ANNUAL_501K_1M, self::CONTRIBUTION_501K_1M => 1000000,
            self::ANNUAL_5M_10M, self::CONTRIBUTION_5M_10M => 10000000,
            self::ANNUAL_10M_50M, self::CONTRIBUTION_10M_50M => 50000000,
            self::ANNUAL_MORE_THAN_100M, self::CONTRIBUTION_MORE_THAN_100M => null,
        };
    }

    public static function filterByType(string $type): array
    {
        return array_filter(self::cases(), fn (self $range) => $range->type() === $type);
    }
}
