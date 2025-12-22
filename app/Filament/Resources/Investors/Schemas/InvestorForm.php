<?php

namespace App\Filament\Resources\Investors\Schemas;

use App\Enums\InvestorStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InvestorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                TextInput::make('investor_field')
                    ->required(),
                Textarea::make('summary')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(InvestorStatus::class)
                    ->default('pending')
                    ->required(),
                DateTimePicker::make('approved_at'),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
                Textarea::make('admin_note')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
