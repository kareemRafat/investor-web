<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('البيانات الأساسية')
                    ->schema([
                        TextInput::make('name')
                            ->label('الاسم')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->required(),

                        TextInput::make('job_title')
                            ->label('الوظيفة')
                            ->required(),


                        Select::make('residence_country')
                            ->label('دولة الإقامة')
                            ->options(
                                fn() => collect(__('idea.steps.step2.options'))
                                    ->pluck('name', 'code')
                                    ->toArray()
                            )
                            ->searchable(),

                        DatePicker::make('birth_date')
                            ->label('تاريخ الميلاد')
                            ->native(false),
                    ])
                    ->columns(2),


                Section::make('بيانات الحساب')
                    ->schema([
                        Select::make('status')
                            ->label('حالة الحساب')
                            ->options(UserStatus::class)
                            ->required()
                            ->native(false),

                        Select::make('role')
                            ->label('الحالة الوظيفية')
                            ->default(null)
                            ->options(UserRole::class)
                            ->required()
                            ->native(false),

                        TextInput::make('password')
                            ->label('الباسورد')
                            ->password()
                            ->revealable()
                            ->helperText(
                                fn($record) => $record && $record->exists
                                    ? 'فى حالة عدم الرغبة فى تعديل الباسورد يرجى ترك الحقل فارغاً'
                                    : null
                            )
                            ->required(fn($record) => ! $record || ! $record->exists)
                            ->rule(
                                fn($record) => $record && $record->exists
                                    ? ['nullable', 'confirmed', 'min:8']
                                    : ['required', 'confirmed', 'min:8']
                            )
                            ->dehydrated(fn($state) => filled($state))
                            ->dehydrateStateUsing(fn($state) => filled($state) ? \Illuminate\Support\Facades\Hash::make($state) : null),

                        TextInput::make('password_confirmation')
                            ->label('تـاكـيد الـباسورد')
                            ->password()
                            ->revealable()
                            ->required(fn($record) => ! $record || ! $record->exists)
                            ->rule(
                                fn($record) => $record && $record->exists
                                    ? ['required_with:password']
                                    : ['required']
                            )
                            ->dehydrated(false),

                    ])
                    ->columns(2),
            ]);
    }
}
