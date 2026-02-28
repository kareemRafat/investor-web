<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل الرسالة')
                    ->columnSpanFull()
                    ->components([
                        Grid::make(2)
                            ->components([
                                TextEntry::make('name')
                                    ->label('الاسم'),

                                TextEntry::make('email')
                                    ->label('البريد الإلكتروني')
                                    ->copyable(),

                                TextEntry::make('phone')
                                    ->label('رقم الهاتف')
                                    ->placeholder('غير متوفر')
                                    ->copyable(),

                                TextEntry::make('subject')
                                    ->label('الموضوع'),

                                TextEntry::make('created_at')
                                    ->label('تاريخ الإرسال')
                                    ->dateTime()
                                    ->columnSpanFull(),

                                TextEntry::make('message')
                                    ->label('الرسالة')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
