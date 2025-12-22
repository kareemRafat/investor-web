<?php

namespace App\Filament\Resources\Investors\Tables;

use Filament\Tables\Table;
use App\Enums\InvestorStatus;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

class InvestorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordAction(null) // prevent clickable row
            ->recordUrl(null)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->state(
                        fn($rowLoop, $livewire) => ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1))
                            + $rowLoop->iteration
                    ),
                TextColumn::make('investor_field')
                    ->label('مجال الإستثمار')
                    ->color('indigo')
                    ->weight('semibold')
                    ->formatStateUsing(fn($state) => __('investor.steps.step1.options.' . $state)),
                TextColumn::make('user.name')
                    ->label('صاحب الفكرة')
                    ->default('غير معروف')
                    ->weight('medium')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable()
            ])
            ->filters([

                SelectFilter::make('investor_field')
                    ->label('مجال الفكرة')
                    ->options(function () {
                        $fields = __('investor.steps.step1.options');
                        return collect($fields)->toArray();
                    })
                    ->searchable(),

                SelectFilter::make('country')
                    ->label('الدولة')
                    ->options(function () {
                        $countries = __('investor.steps.step2.options', [], 'ar');
                        return collect($countries)->mapWithKeys(function ($country) {
                            return [
                                $country['code'] => $country['name'],
                            ];
                        })->toArray();
                    })
                    ->query(function (Builder $query, array $data) { // لاحظ تغيير $state لـ $data
                        return $query->when(
                            $data['value'],
                            fn(Builder $query, $value): Builder => $query->whereHas('countries', function ($q) use ($value) {
                                $q->where('country', $value);
                            })
                        );
                    })
                    ->searchable(),

                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options(InvestorStatus::class)
                    ->native(false),

            ], layout: FiltersLayout::AboveContent)
            ->deferFilters(false)

            ->recordActions([
                // EditAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
