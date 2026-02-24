<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PlanType: string implements HasColor, HasLabel
{
    case FREE = 'free';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';

    public function getLabel(): string
    {
        return match ($this) {
            self::FREE => __('pages.plans.free'),
            self::MONTHLY => __('pages.plans.monthly'),
            self::YEARLY => __('pages.plans.yearly'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FREE => 'gray',
            self::MONTHLY => 'success',
            self::YEARLY => 'danger',
        };
    }

    public function getSortOrder(): int
    {
        return match ($this) {
            self::FREE => 0,
            self::MONTHLY => 1,
            self::YEARLY => 2,
        };
    }
}
