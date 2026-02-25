<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المعاملة')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('user.name')
                                    ->label('المستخدم'),

                                TextEntry::make('amount')
                                    ->label('المبلغ')
                                    ->money(fn ($record) => $record->currency, locale: 'en'),

                                TextEntry::make('status')
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
                            ]),
                    ]),

                Section::make('تفاصيل بوابة الدفع')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('gateway')
                                    ->label('بوابة الدفع')
                                    ->badge(),

                                TextEntry::make('gateway_order_id')
                                    ->label('معرف الطلب (Order ID)')
                                    ->copyable(),

                                TextEntry::make('gateway_transaction_id')
                                    ->label('معرف المعاملة (Transaction ID)')
                                    ->placeholder('غير متوفر')
                                    ->copyable(),
                            ]),
                    ]),

                Section::make('الأوقات')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('تاريخ الإنشاء')
                                    ->dateTime(),

                                TextEntry::make('processed_at')
                                    ->label('تاريخ المعالجة')
                                    ->dateTime()
                                    ->placeholder('لم يتم المعالجة بعد'),
                            ]),
                    ]),

                Section::make('خطأ المعاملة')
                    ->visible(fn ($record) => $record->status === 'failed' && $record->error_message)
                    ->schema([
                        TextEntry::make('error_message')
                            ->label('رسالة الخطأ')
                            ->color('danger')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
