<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Size;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'read' => 'success',
                        'unread' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'read' => 'مقروءة',
                        'unread' => 'غير مقروءة',
                        default => $state,
                    }),

                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->searchable(),

                TextColumn::make('subject')
                    ->label('الموضوع')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإرسال')
                    ->dateTime('Y-m-d')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('حالة القراءة')
                    ->options([
                        'read' => 'مقروءة',
                        'unread' => 'غير مقروءة',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()
                    ->mountUsing(function (ContactMessage $record, \Filament\Schemas\Schema $form) {
                        if ($record->status === 'unread') {
                            $record->update(['status' => 'read']);
                        }
                        $form->fill($record->toArray());
                    }),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->mountUsing(function (ContactMessage $record, \Filament\Schemas\Schema $form) {
                            if ($record->status === 'unread') {
                                $record->update(['status' => 'read']);
                            }
                            $form->fill($record->toArray());
                        }),
                    Action::make('mark_as_read')
                        ->label('تم القراءة')
                        ->icon(Heroicon::CheckCircle)
                        ->color('success')
                        ->visible(fn(ContactMessage $record) => $record->status === 'unread')
                        ->action(function (ContactMessage $record) {
                            $record->update(['status' => 'read']);
                            Notification::make()
                                ->title('تم تحديث الحالة')
                                ->body('تم تحديد الرسالة كمقروءة')
                                ->success()
                                ->send();
                        }),
                    Action::make('mark_as_unread')
                        ->label('غير مقروءة')
                        ->icon(Heroicon::Envelope)
                        ->color('danger')
                        ->visible(fn(ContactMessage $record) => $record->status === 'read')
                        ->action(function (ContactMessage $record) {
                            $record->update(['status' => 'unread']);
                            Notification::make()
                                ->title('تم تحديث الحالة')
                                ->body('تم تحديد الرسالة كغير مقروءة')
                                ->success()
                                ->send();
                        }),
                    DeleteAction::make(),
                ])
                    ->label('المزيد')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size('xs')
                    ->color('violet')
                    ->button(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('mark_as_read')
                        ->label('تم القراءة')
                        ->icon(Heroicon::CheckCircle)
                        ->color('success')
                        ->action(fn(Collection $records) => $records->toQuery()->update(['status' => 'read'])),
                    BulkAction::make('mark_as_unread')
                        ->label('غير مقروءة')
                        ->icon(Heroicon::Envelope)
                        ->color('danger')
                        ->action(fn(Collection $records) => $records->toQuery()->update(['status' => 'unread'])),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
