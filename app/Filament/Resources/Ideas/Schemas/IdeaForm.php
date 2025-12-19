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
                TextInput::make('user_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('idea_field')
                    ->required(),
                Textarea::make('summary')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
