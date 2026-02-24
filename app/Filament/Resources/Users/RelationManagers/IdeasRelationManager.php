<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Ideas\Tables\IdeasTable;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class IdeasRelationManager extends RelationManager
{
    protected static string $relationship = 'ideas';

    protected static ?string $title = 'الأفكار';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idea_field')
                    ->required(),
                Textarea::make('summary')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return IdeasTable::configure($table);
    }
}
