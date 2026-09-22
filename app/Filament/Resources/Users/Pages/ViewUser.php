<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Actions\UserActions\ChangeStatusAction;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('العودة إلى القائمة')
                ->icon('heroicon-o-arrow-left')
                ->url(function () {
                    $resource = static::getResource();

                    return $resource::getUrl('index');
                })
                ->color('gray'),

            ChangeStatusAction::make(),

            EditAction::make()
                ->color('info'),
        ];
    }
}
