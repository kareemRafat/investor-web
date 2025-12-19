<?php

namespace App\Filament\Actions\UserActions;

use App\Enums\UserStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Forms\Components\ToggleButtons;


class ChangeStatusAction
{
    // This class can be used to define shared logic or constants for the Change Status action

    public static function make(): Action
    {
        return Action::make('changeStatus')
            ->label('تغيير الحالة')
            ->icon('heroicon-s-clipboard-document-check')
            ->color('info')
            ->modalHeading('تغيير حالة المستخدم')
            ->modalSubmitActionLabel('حفظ')
            ->form([
                ToggleButtons::make('status')
                    ->label('الحالة')
                    ->options(UserStatus::class)
                    ->required()
                    ->inline()
                    ->grouped()
                    ->default(fn ($record) => $record?->status ?? 'active')
                    ->colors([
                        'active' => 'success',
                        'inactive' => 'danger',
                    ])
                    ->icons([
                        'active' => 'heroicon-o-check-circle',
                        'inactive' => 'heroicon-o-x-circle',
                        'pending' => 'heroicon-o-clock',
                    ])
            ])
            ->action(function ($record, array $data) {
                $record->status = is_string($data['status'])
                    ? UserStatus::from($data['status'])
                    : $data['status'];

                $record->save();

                Notification::make()
                    ->title('تم تغيير الحالة بنجاح')
                    ->success()
                    ->send();
            });
    }
}
