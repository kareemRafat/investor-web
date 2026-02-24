<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Investors\Tables\InvestorsTable;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class InvestorsRelationManager extends RelationManager
{
    protected static string $relationship = 'investors';

    protected static ?string $title = 'عروض الإستثمار';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('عروض الاستثمار')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return InvestorsTable::configure($table);
    }
}
