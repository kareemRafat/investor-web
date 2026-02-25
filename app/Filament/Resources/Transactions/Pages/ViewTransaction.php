<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Actions\TransactionActions\VerifyPayPalStatusAction;
use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            VerifyPayPalStatusAction::make(),
            Action::make('back')
                ->label('العودة')
                ->icon('heroicon-o-arrow-left')
                ->url(TransactionResource::getUrl('index'))
                ->color('gray'),
        ];
    }
}
