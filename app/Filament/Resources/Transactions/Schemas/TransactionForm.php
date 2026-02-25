<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المعاملة')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('المستخدم')
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                TextInput::make('amount')
                                    ->label('المبلغ')
                                    ->numeric()
                                    ->required()
                                    ->prefix('$'),

                                TextInput::make('currency')
                                    ->label('العملة')
                                    ->required()
                                    ->default('USD'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('gateway')
                                    ->label('بوابة الدفع')
                                    ->options([
                                        'paypal' => 'PayPal',
                                        'mock' => 'Mock',
                                    ])
                                    ->required()
                                    ->native(false),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options([
                                        'completed' => 'مكتمل',
                                        'pending' => 'قيد الانتظار',
                                        'processing' => 'جاري المعالجة',
                                        'failed' => 'فاشل',
                                        'refunded' => 'مسترجع',
                                    ])
                                    ->required()
                                    ->native(false),
                            ]),
                    ]),

                Section::make('تفاصيل بوابة الدفع')
                    ->schema([
                        TextInput::make('gateway_order_id')
                            ->label('معرف الطلب (Order ID)')
                            ->maxLength(255),

                        TextInput::make('gateway_transaction_id')
                            ->label('معرف المعاملة (Transaction ID)')
                            ->maxLength(255),
                    ]),

                Section::make('معلومات إضافية')
                    ->schema([
                        DateTimePicker::make('processed_at')
                            ->label('تاريخ المعالجة'),

                        Textarea::make('error_message')
                            ->label('رسالة الخطأ')
                            ->columnSpanFull(),

                        Textarea::make('payload')
                            ->label('البيانات الخام (Payload)')
                            ->rows(10)
                            ->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
