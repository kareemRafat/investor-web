<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PlanType: string implements HasLabel, HasColor
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

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::FREE => 'gray',
            self::MONTHLY => 'info',
            self::YEARLY => 'success',
        };
    }
}
