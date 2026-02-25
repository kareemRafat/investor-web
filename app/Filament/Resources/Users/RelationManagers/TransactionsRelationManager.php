<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Transactions\Tables\TransactionsTable;
use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactions';

    protected static ?string $relatedResource = TransactionResource::class;

    protected static ?string $title = 'سجل المدفوعات';

    protected static ?string $modelLabel = 'عملية دفع';

    protected static ?string $pluralModelLabel = 'سجل المدفوعات';

    public function table(Table $table): Table
    {
        return TransactionsTable::configure($table)
            ->columns([
                ...collect($table->getColumns())
                    ->reject(fn ($column) => $column->getName() === 'user.name')
                    ->toArray(),
            ]);
    }
}
