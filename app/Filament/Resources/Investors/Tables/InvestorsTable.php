<?php

namespace App\Filament\Resources\Investors\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Enums\InvestorStatus;
use App\Filament\Resources\Investors\InvestorResource;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
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
            ->modifyQueryUsing(
                fn($query) =>
                $query->with([
                    'user:id,name,email',
                    'countries',
                    'contributions:id,investor_id,contribute_type,money_contributions',
                    'contributions.contributionRange:id,type,label_en,label_ar',
                    'approver:id,name',
                ])
                    ->withCount(['attachments', 'contactUnlocks'])
            )
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('لا توجد عروض استثمار')
            ->emptyStateDescription('لم يتم إضافة أي عروض استثمار بعد')
            ->emptyStateIcon('heroicon-s-inbox')
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->state(
                        fn($rowLoop, $livewire) => ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1))
                            + $rowLoop->iteration
                    )
                    ->alignCenter(),

                TextColumn::make('investor_field')
                    ->label('مجال الاستثمار')
                    ->color('teal')
                    ->weight('medium')
                    ->formatStateUsing(fn($state) => __('investor.steps.step1.options.' . $state))
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('صاحب الاستثمار')
                    ->default('غير معروف')
                    ->weight('medium')
                    ->searchable(),

                TextColumn::make('contact_visibility')
                    ->label('ظهور البيانات')
                    ->badge(),

                TextColumn::make('contact_unlocks_count')
                    ->label('مرات الفتح')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ التقديم')
                    ->date()
                    ->sortable()
                    ->toggleable(),

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
                    ->width('200px')
                    ->default('-'),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge(),

                TextColumn::make('approved_at')
                    ->label('تاريخ الموافقة')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('لم تتم الموافقة بعد'),

                TextColumn::make('approver.name')
                    ->label('تمت الموافقة بواسطة')
                    ->default('-')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                SelectFilter::make('investor_field')
                    ->label('مجال الإستثمار')
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
                Action::make('toggle_visibility')
                    ->label(fn($record) => $record->contact_visibility === \App\Enums\ContactVisibility::OPEN ? 'إخفاء البيانات' : 'إظهار البيانات')
                    ->icon(fn($record) => $record->contact_visibility === \App\Enums\ContactVisibility::OPEN ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                    ->color(fn($record) => $record->contact_visibility === \App\Enums\ContactVisibility::OPEN ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $newVisibility = $record->contact_visibility === \App\Enums\ContactVisibility::OPEN
                            ? \App\Enums\ContactVisibility::CLOSED
                            : \App\Enums\ContactVisibility::OPEN;

                        $record->update(['contact_visibility' => $newVisibility]);

                        Notification::make()
                            ->title('تم تحديث حالة الظهور بنجاح')
                            ->success()
                            ->send();
                    }),
                ViewAction::make()
                    ->url(
                        fn($record): string =>
                        InvestorResource::getUrl('view', ['record' => $record])
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
