<?php

namespace App\Filament\Actions\InvestorAction;

use Filament\Actions\Action;
use App\Enums\InvestorStatus;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use App\Filament\Forms\Components\ClientDatetimeHidden;

class ChangeInvestorStatusAction
{
    public static function make(): Action
    {
        return Action::make('changeStatus')
            ->label(fn($record) => $record->status->getLabel() . ' - تغيير الحالة')
            ->icon(fn($record) => match ($record->status) {
                InvestorStatus::APPROVED => 'heroicon-o-check-circle',
                InvestorStatus::REJECTED => 'heroicon-o-x-circle',
                InvestorStatus::PENDING => 'heroicon-o-clock',
                default => 'heroicon-o-arrow-path',
            })
            ->color(fn($record) => $record->status->getColor())
            ->schema([
                Select::make('status')
                    ->label('الحالة الجديدة')
                    ->options(InvestorStatus::getOptions())
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

                $newStatus = InvestorStatus::from($data['status']);
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

                // إذا تم الرفض ، نحذف بيانات الموافقة
                if ($newStatus->isPending()) {
                    $updates['approved_at'] = null;
                    $updates['approved_by'] = null;
                }

                $record->update($updates);

                Notification::make()
                    ->title('تم تحديث حالة المستثمر')
                    ->body("تم تغيير حالة المستثمر من {$oldStatus->getLabel()} إلى {$newStatus->getLabel()}")
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
