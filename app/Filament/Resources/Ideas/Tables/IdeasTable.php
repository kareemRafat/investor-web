<?php

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Lang;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn($query) =>
                $query->with([
                    'user:id,name',
                    'countries:id,country,countryable_id,countryable_type',
                    'profits:id,idea_id,profit_type,range_id',
                    'costs:id,idea_id,cost_type,range_id',
                ])
            )
            ->recordAction(null) // prevent clickable row
            ->recordUrl(null)
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->state(
                        fn($rowLoop, $livewire) => ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1))
                            + $rowLoop->iteration
                    ),
                TextColumn::make('idea_field')
                    ->label('مجال الفكرة')
                    ->color('indigo')
                    ->weight('semibold')
                    ->formatStateUsing(fn($state) => __('idea.steps.step1.options.' . $state)),
                TextColumn::make('user.name')
                    ->label('صاحب الفكرة')
                    ->default('غير معروف')
                    ->weight('medium')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable(),
                TextColumn::make('profit_type')
                    ->label('الأرباح')
                    ->badge()
                    ->getStateUsing(
                        fn($record) =>
                        optional($record->profits->first())->profit_type
                    )
                    ->colors([
                        'success' => 'annual',
                        'info' => 'one-time',
                    ])
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'annual' ? 'سنوية' : 'مرة واحدة'
                    ),
                TextColumn::make('cost_type')
                    ->label('التكاليف')
                    ->badge()
                    ->getStateUsing(
                        fn($record) =>
                        optional($record->costs->first())->cost_type
                    )
                    ->colors([
                        'danger' => 'annual',
                        'warning' => 'one-time',
                    ])
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'annual' ? 'سنوية' : 'مرة واحدة'
                    ),
                TextColumn::make('countries.country')
                    ->label('الدول')
                    ->badge()
                    ->color('indigo')
                    ->getStateUsing(function ($record) {
                        $options = __('idea.steps.step2.options');
                        return $record->countries->map(function ($country) use ($options) {
                            $found = collect($options)->firstWhere('code', $country->country);
                            $name = $found['name'] ?? $country->country;
                            return $name;
                        })->toArray();
                    })
                    ->wrap()
                    ->width('250px')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable(),
            ])
            ->filters([

                SelectFilter::make('idea_field')
                    ->label('مجال الفكرة')
                    ->options(function () {
                        $fields = __('idea.steps.step1.options');
                        return collect($fields)->toArray();
                    })
                    ->searchable(),

                SelectFilter::make('country')
                    ->label('الدولة')
                    ->options(function () {
                        $countries = __('idea.steps.step2.options', [], 'ar');
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
                    ->searchable()
            ], layout: FiltersLayout::AboveContent)
            ->deferFilters(false)
            ->recordActions([
                ViewAction::make(),
                // EditAction::make()
                //     ->label('مراجعة ملخص الفكرة'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
