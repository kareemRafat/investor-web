<?php

namespace App\Filament\Resources\Investors\Schemas;

use App\Enums\ContactVisibility;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InvestorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('investor_field')
                    ->label('مجال الفكرة')
                    ->required()
                    ->columnSpanFull()
                    ->formatStateUsing(
                        fn ($state) => __('investor.steps.step1.options.'.$state)
                    )
                    ->disabled(),

                Select::make('contact_visibility')
                    ->label('ظهور بيانات الاتصال')
                    ->options(ContactVisibility::class)
                    ->required()
                    ->native(false)
                    ->columnSpanFull(),

                Textarea::make('summary')
                    ->label('ملخص عن فكرة الاستثمار')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('admin_note')
                    ->label('ملاحظات المشرف')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
