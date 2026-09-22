<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\UserStatus;
use App\Filament\Actions\UserActions\ChangeStatusAction;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // ->recordAction(null) // prevent clickable row
            // ->recordUrl(null)
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->recordUrl(fn ($record) => UserResource::getUrl('view', ['record' => $record]))
            ->groups([
                // table group by Role
                Group::make('role')
                    ->label('الصلاحية')
                    ->titlePrefixedWithLabel(false)
                    ->getTitleFromRecordUsing(function ($record) {
                        return $record->role === \App\Enums\UserRole::ADMIN
                            ? 'المشرفون'
                            : 'الإعضاء';
                    })
                    ->getDescriptionFromRecordUsing(function ($record) {
                        return $record->role === \App\Enums\UserRole::ADMIN
                            ? 'هذا القسم يعرض المشرفين على إدارة الموقع'
                            : 'هذا القسم يعرض الأعضاء المسجلين بالموقع ';
                    }),

            ])
            ->groupingSettingsHidden()
            ->defaultGroup('role')

            ->columns([
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (UserStatus $state) => $state->getColor()),

                TextColumn::make('plan_type')
                    ->label('الباقة')
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->native(false)
                    ->options(
                        collect(UserStatus::class)
                    ),

                SelectFilter::make('role')
                    ->label('الدور')
                    ->native(false)
                    ->options(
                        collect(UserRole::class)
                    ),

                SelectFilter::make('plan_type')
                    ->label('الباقة')
                    ->options(\App\Enums\PlanType::class)
                    ->native(false),
            ], layout: FiltersLayout::AboveContent)
            ->deferFilters(false)
            ->recordActions([
                ViewAction::make()
                    ->color('gray'),
                ChangeStatusAction::make(),
                Action::make('reset_credits')
                    ->label('تصفير الرصيد')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['contact_credits' => 10]);
                        Notification::make()
                            ->title('تم تصفير الرصيد بنجاح')
                            ->success()
                            ->send();
                    }),
                EditAction::make()
                    ->color('info'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
