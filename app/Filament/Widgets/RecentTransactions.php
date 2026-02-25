<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentTransactions extends TableWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'أحدث المعاملات المكتملة';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Transaction::query()->with(['user'])->latest()->limit(5))
            ->columns([
                TextColumn::make('user.name')
                    ->label('المستخدم')
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('المبلغ')
                    ->money(fn ($record) => $record->currency, locale: 'en'),

                TextColumn::make('gateway')
                    ->label('بوابة الدفع')
                    ->badge(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'processing' => 'info',
                        'failed' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed' => 'مكتمل',
                        'pending' => 'قيد الانتظار',
                        'processing' => 'جاري المعالجة',
                        'failed' => 'فاشل',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
