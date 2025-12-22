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
            ->extraAttributes(['class' => 'text-white'])
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
                    ->maxLength(500)
                    ->default(fn($record) => $record->admin_note),

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
                    $updates['approved_by'] = Auth::id();
                }

                // إذا تم التعليق ، نحذف بيانات الموافقة
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
}
