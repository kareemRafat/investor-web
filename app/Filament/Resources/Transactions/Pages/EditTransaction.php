<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('العودة')
                ->icon('heroicon-o-arrow-left')
                ->url(fn () => url()->previous())
                ->color('gray'),
            ViewAction::make(),
        ];
    }
}
