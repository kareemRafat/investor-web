<?php

namespace App\Filament\Resources\Ideas\Schemas;

use App\Enums\ContactVisibility;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IdeaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idea_field')
                    ->label('مجال الفكرة')
                    ->required()
                    ->columnSpanFull()
                    ->formatStateUsing(
                        fn ($state) => __('idea.steps.step1.options.'.$state)
                    )
                    ->disabled(),

                Select::make('contact_visibility')
                    ->label('ظهور بيانات الاتصال')
                    ->options(ContactVisibility::class)
                    ->required()
                    ->native(false)
                    ->columnSpanFull(),

                Textarea::make('summary')
                    ->label('ملخص الفكرة')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('admin_note')
                    ->label('ملاحظات المشرف')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
