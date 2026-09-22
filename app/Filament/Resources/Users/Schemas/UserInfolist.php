<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\PlanType;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('البيانات الشخصية')
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

                                TextEntry::make('job_title')
                                    ->label('الوظيفة')
                                    ->placeholder('غير متوفر'),

                                TextEntry::make('residence_country')
                                    ->label('دولة الإقامة')
                                    ->placeholder('غير متوفر')
                                    ->formatStateUsing(function (?string $state) {
                                        if (! $state) {
                                            return null;
                                        }
                                        $countries = collect(__('idea.steps.step2.options'))
                                            ->pluck('name', 'code')
                                            ->toArray();

                                        return $countries[$state] ?? $state;
                                    }),

                                TextEntry::make('birth_date')
                                    ->label('تاريخ الميلاد')
                                    ->date('Y-m-d')
                                    ->placeholder('غير متوفر'),
                            ]),
                    ]),

                Section::make('بيانات الحساب')
                    ->columnSpanFull()
                    ->components([
                        Grid::make(2)
                            ->components([
                                TextEntry::make('status')
                                    ->label('الحالة')
                                    ->badge()
                                    ->color(fn (UserStatus $state) => $state->getColor()),

                                TextEntry::make('role')
                                    ->label('الصلاحية')
                                    ->badge()
                                    ->formatStateUsing(fn (UserRole $state) => $state)
                                    ->color(fn (UserRole $state) => $state->getColor()),

                                TextEntry::make('plan_type')
                                    ->label('الباقة')
                                    ->badge()
                                    ->formatStateUsing(fn (PlanType $state) => $state->getLabel()),

                                TextEntry::make('contact_credits')
                                    ->label('رصيد الفتح')
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('email_verified_at')
                                    ->label('تفعيل البريد')
                                    ->dateTime('Y-m-d H:i')
                                    ->placeholder('غير مفعّل'),

                                TextEntry::make('created_at')
                                    ->label('تاريخ التسجيل')
                                    ->dateTime('Y-m-d H:i'),
                            ]),
                    ]),

                Section::make('الإحصائيات')
                    ->columnSpanFull()
                    ->components([
                        Grid::make(3)
                            ->components([
                                TextEntry::make('ideas_count')
                                    ->label('الأفكار')
                                    ->counts('ideas')
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('investors_count')
                                    ->label('عروض الاستثمار')
                                    ->counts('investors')
                                    ->badge()
                                    ->color('gray'),

                                TextEntry::make('completed_transactions_sum_amount')
                                    ->label('إجمالي الدفع')
                                    ->sum('completedTransactions', 'amount')
                                    ->money('USD', locale: 'en')
                                    ->color('success'),
                            ]),
                    ]),
            ]);
    }
}
