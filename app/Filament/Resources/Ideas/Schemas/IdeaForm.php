<?php

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                        fn($state) => __('idea.steps.step1.options.' . $state)
                    )
                    ->disabled(),
                Textarea::make('summary')
                    ->label('ملخص الفكرة')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
