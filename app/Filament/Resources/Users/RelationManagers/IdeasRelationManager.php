<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DissociateBulkAction;
use App\Filament\Resources\Ideas\IdeaResource;
use App\Filament\Resources\Ideas\Tables\IdeasTable;
use Filament\Resources\RelationManagers\RelationManager;

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
