<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SubscriptionStatus: string implements HasColor, HasLabel
{
    case ACTIVE = 'active';
    case EXPIRED = 'expired';
    case CANCELLED = 'cancelled';
    case PENDING = 'pending';

    public function getLabel(): string
    {
        return match ($this) {
            self::ACTIVE => 'نشط',
            self::EXPIRED => 'منتهي',
            self::CANCELLED => 'ملغي',
            self::PENDING => 'قيد الانتظار',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::EXPIRED => 'danger',
            self::CANCELLED => 'warning',
            self::PENDING => 'info',
        };
    }
}
