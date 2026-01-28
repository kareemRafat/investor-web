<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UnlockMethod: string implements HasLabel
{
    case CREDIT = 'credit';
    case PAY_PER_USE = 'pay_per_use';

    public function getLabel(): string
    {
        return match ($this) {
            self::CREDIT => 'رصيد',
            self::PAY_PER_USE => 'دفع مباشر',
        };
    }
}
