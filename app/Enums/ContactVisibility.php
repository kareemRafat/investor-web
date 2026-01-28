<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum ContactVisibility: string implements HasLabel, HasColor
{
    case OPEN = 'open';
    case CLOSED = 'closed';

    public function getLabel(): string
    {
        return match ($this) {
            self::OPEN => 'مفتوح',
            self::CLOSED => 'مغلق',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::OPEN => 'success',
            self::CLOSED => 'danger',
        };
    }
}
