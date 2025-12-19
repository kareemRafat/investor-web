<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Filament\Actions\UserActions\ChangeStatusAction;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Grouping\Group;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordAction(null) // prevent clickable row
            ->recordUrl(null)
            ->striped()
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

                TextColumn::make('job_title')
                    ->label('الوظيفة')
                    ->toggleable(),

                TextColumn::make('residence_country')
                    ->label('دولة الإقامة')

                    ->formatStateUsing(function (?string $state) {
                        if (! $state) {
                            return null;
                        }
                        $countries = collect(__('idea.steps.step2.options'))
                            ->pluck('name', 'code')
                            ->toArray();

                        return $countries[$state] ?? $state;
                    }),

                TextColumn::make('birth_date')
                    ->label('تاريخ الميلاد')
                    ->date('Y-m-d')
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn(UserStatus $state) => $state->getColor()),

                TextColumn::make('role')
                    ->label('الصلاحية')
                    ->badge()
                    ->formatStateUsing(fn(UserRole $state) => $state)
                    ->color(fn(UserRole $state) => $state->getColor()),

                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ], layout: FiltersLayout::AboveContent)
            ->deferFilters(false)
            ->recordActions([
                ChangeStatusAction::make(),
                EditAction::make()
                    ->color('info'),
                // ->hidden(fn($record) => $record->role !== UserRole::ADMIN)




            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
