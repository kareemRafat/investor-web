<?php

namespace App\Filament\Actions\IdeaAction;

use App\Enums\IdeaStatus;
use App\Filament\Forms\Components\ClientDatetimeHidden;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ChangeIdeaStatusAction
{
    public static function make(): Action
    {
        return Action::make('changeStatus')
            ->label(fn($record) => $record->status->getLabel() . ' - تغيير الحالة')
            ->icon(fn($record) => $record->status->getIcon())
            ->color(fn($record) => $record->status->getColor())
            ->schema([
                Select::make('status')
                    ->label('الحالة الجديدة')
                    ->options(IdeaStatus::getOptions())
                    ->required()
                    ->native(false)
                    ->default(fn($record) => $record->status),

                Textarea::make('admin_note')
                    ->label('ملاحظات الإدارة (اختياري)')
                    ->rows(3)
                    ->maxLength(500),

                ClientDatetimeHidden::make('approved_at'),
            ])
            ->action(function (array $data, $record) {

                $newStatus = IdeaStatus::from($data['status']);
                $oldStatus = $record->status;

                // تحديث البيانات حسب الحالة
                $updates = [
                    'status' => $newStatus,
                    'admin_note' => $data['admin_note'] ?? null,
                ];

                // إذا تمت الموافقة
                if ($newStatus->isApproved()) {
                    $updates['approved_at'] = $data['approved_at'];
                    $updates['approved_by'] = Auth::id();
                }

                // إذا تم الرفض
                if ($newStatus->isRejected()) {
                    $updates['approved_at'] = $data['approved_at'];
                    $updates['approved_by'] = null;
                }

                // إذا تم الرفض ، نحذف بيانات الموافقة
                if ($newStatus->isPending()) {
                    $updates['approved_at'] = null;
                    $updates['approved_by'] = null;
                }

                $record->update($updates);

                // إشعار للمستخدم
                Notification::make()
                    ->title('تم تحديث حالة الفكرة')
                    ->body("تم تغيير حالة الفكرة من {$oldStatus->getLabel()} إلى {$newStatus->getLabel()}")
                    ->success()
                    ->send();

                // يمكنك إرسال إشعار للمستخدم صاحب الفكرة
                // $record->user->notify(new IdeaStatusChanged($record));
            })
            ->requiresConfirmation()
            ->modalHeading('تغيير حالة الفكرة')
            ->modalDescription(fn($record) => "أنت على وشك تغيير حالة الفكرة: {$record->idea}")
            ->modalSubmitActionLabel('تأكيد التغيير');
    }

    /**
     * أكشن سريع للموافقة
     */
    public static function approve(): Action
    {
        return Action::make('approve')
            ->label('موافقة')
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn($record) => !$record->status->isApproved())
            ->requiresConfirmation()
            ->modalHeading('الموافقة على الفكرة')
            ->modalDescription('هل أنت متأكد من الموافقة على هذه الفكرة؟')
            ->action(function ($record) {
                $record->update([
                    'status' => IdeaStatus::APPROVED,
                    'approved_at' => now(),
                    'approved_by' => Auth::id(),
                ]);

                Notification::make()
                    ->title('تمت الموافقة')
                    ->body('تمت الموافقة على الفكرة بنجاح')
                    ->success()
                    ->send();
            });
    }

    /**
     * أكشن سريع للرفض
     */
    public static function reject(): Action
    {
        return Action::make('reject')
            ->label('رفض')
            ->icon('heroicon-o-x-circle')
            ->color('danger')
            ->visible(fn($record) => !$record->status->isRejected())
            ->schema([
                Textarea::make('rejection_reason')
                    ->label('سبب الرفض')
                    ->required()
                    ->rows(3)
                    ->maxLength(500),
            ])
            ->requiresConfirmation()
            ->modalHeading('رفض الفكرة')
            ->action(function (array $data, $record) {
                $record->update([
                    'status' => IdeaStatus::REJECTED,
                    'approved_at' => null,
                    'approved_by' => null,
                    'admin_note' => $data['rejection_reason'],
                ]);

                Notification::make()
                    ->title('تم رفض الفكرة')
                    ->body('تم رفض الفكرة وإرسال السبب للمستخدم')
                    ->success()
                    ->send();
            });
    }

    /**
     * أكشن لتعليق الموافقة
     */
    public static function suspend(): Action
    {
        return Action::make('suspend')
            ->label('تعليق للمراجعة')
            ->icon('heroicon-o-pause-circle')
            ->color('warning')
            ->visible(fn($record) => !$record->status->isPending())
            ->schema([
                Textarea::make('suspension_note')
                    ->label('سبب التعليق')
                    ->required()
                    ->rows(3)
                    ->maxLength(500),
            ])
            ->requiresConfirmation()
            ->modalHeading('تعليق الفكرة للمراجعة')
            ->action(function (array $data, $record) {
                $record->update([
                    'status' => IdeaStatus::PENDING,
                    'approved_at' => null,
                    'approved_by' => null,
                    'admin_note' => $data['suspension_note'],
                ]);

                Notification::make()
                    ->title('تم تعليق الفكرة')
                    ->body('تم تعليق الفكرة للمراجعة')
                    ->warning()
                    ->send();
            });
    }
}
