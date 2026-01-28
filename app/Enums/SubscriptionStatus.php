<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum SubscriptionStatus: string implements HasLabel, HasColor
{
    case ACTIVE = 'active';
    case EXPIRED = 'expired';
    case CANCELLED = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::ACTIVE => 'نشط',
            self::EXPIRED => 'منتهي',
            self::CANCELLED => 'ملغي',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::EXPIRED => 'danger',
            self::CANCELLED => 'warning',
        };
    }
}
