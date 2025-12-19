<?php

namespace App\Filament\Actions\UserActions;

use App\Enums\UserStatus;
use Filament\Actions\Action;
use Filament\Support\Enums\Width;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Forms\Components\ToggleButtons;


class ChangeStatusAction
{
    // This class can be used to for the Change Status action

    public static function make(): Action
    {
        return Action::make('toggleStatus')
            ->label('تغيير الحالة')
            ->label(function ($record) {
                return $record->status === UserStatus::ACTIVE
                    ? 'تعطيل '
                    : 'تنشيط ';
            })
            ->icon(function ($record) {
                return $record->status === UserStatus::ACTIVE
                    ? 'heroicon-s-lock-closed'
                    : 'heroicon-s-lock-open';
            })
            ->color((function ($record) {
                return $record->status === UserStatus::ACTIVE
                    ? 'teal'
                    : 'danger';
            }))
            ->requiresConfirmation()
            ->modalDescription(function ($record) {
                if ($record->status === UserStatus::ACTIVE) {
                    return "هل انت متأكد من تعطيل المستخدم ؟";
                } else {
                    return "هل انت متأكد من تنشيط المستخدم ؟";
                }
            })
            ->action(function ($record) {
                // قلب الحالة ببساطة
                $record->update([
                    'status' => $record->status === UserStatus::ACTIVE
                        ? UserStatus::INACTIVE
                        : UserStatus::ACTIVE
                ]);

                Notification::make()
                    ->title('تم تغيير حالة المستخدم بنجاح')
                    ->success()
                    ->send();
            });
    }
}
