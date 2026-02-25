<?php

namespace App\Filament\Resources\Transactions\Tables;

use App\Filament\Actions\TransactionActions\VerifyPayPalStatusAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->columns([
                TextColumn::make('user.name')
                    ->label('المستخدم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payable_type')
                    ->label('الخدمة/المنتج')
                    ->formatStateUsing(fn (string $state, $record): string => match ($state) {
                        'App\Models\Subscription' => 'إشتراك (' . ($record->payable?->plan_type?->getLabel() ?? '---') . ')',
                        'App\Models\ContactUnlock' => 'فتح بيانات تواصل',
                        default => 'أخرى',
                    })
                    ->badge()
                    ->color('gray'),

                TextColumn::make('amount')
                    ->label('المبلغ')
                    ->money(fn ($record) => $record->currency, locale: 'en')
                    ->sortable(),

                TextColumn::make('gateway')
                    ->label('بوابة الدفع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paypal' => 'info',
                        'mock' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'processing' => 'info',
                        'failed' => 'danger',
                        'refunded' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed' => 'مكتمل',
                        'pending' => 'قيد الانتظار',
                        'processing' => 'جاري المعالجة',
                        'failed' => 'فاشل',
                        'refunded' => 'مسترجع',
                        default => $state,
                    }),

                TextColumn::make('gateway_order_id')
                    ->label('معرف الطلب')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('gateway_transaction_id')
                    ->label('معرف المعاملة')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('processed_at')
                    ->label('تاريخ المعالجة')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'completed' => 'مكتمل',
                        'pending' => 'قيد الانتظار',
                        'processing' => 'جاري المعالجة',
                        'failed' => 'فاشل',
                        'refunded' => 'مسترجع',
                    ])
                    ->native(false)
                    ->columnSpan(1),

                SelectFilter::make('gateway')
                    ->label('بوابة الدفع')
                    ->options([
                        'paypal' => 'PayPal',
                    ])
                    ->native(false)
                    ->columnSpan(1),

                Filter::make('created_at')
                    ->schema([
                        DatePicker::make('created_from')->label('من تاريخ'),
                        DatePicker::make('created_until')->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_from'] ?? null) {
                            $indicators[] = 'من تاريخ '.$data['created_from'];
                        }
                        if ($data['created_until'] ?? null) {
                            $indicators[] = 'إلى تاريخ '.$data['created_until'];
                        }

                        return $indicators;
                    })
                    ->columnSpan(2)
                    ->columns(2),
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4)
            ->deferFilters(false)
            ->recordActions([
                // VerifyPayPalStatusAction::make(),
                ViewAction::make(),
                // EditAction::make()->color('info'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
