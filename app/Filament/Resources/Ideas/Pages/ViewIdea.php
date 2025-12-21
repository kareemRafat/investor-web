<?php

namespace App\Filament\Resources\Ideas\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Ideas\IdeaResource;

class ViewIdea extends ViewRecord
{
    protected static string $resource = IdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function getRecordQuery()
    {
        return parent::getRecordQuery()
            ->with([
                'user:id,name,email',
                'countries:id,country,countryable_id,countryable_type',
                'profits:id,idea_id,profit_type,range_id',
                'costs:id,idea_id,cost_type,range_id',
                'resources',
                'expenses',
                'contributions',
                'returns',
                'attachments',
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('معلومات الفكرة')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label('رقم الفكرة'),

                        TextEntry::make('idea_field')
                            ->label('مجال الفكرة')
                            ->formatStateUsing(fn($state) => __('idea.steps.step1.options.' . $state)),

                        TextEntry::make('summary')
                            ->label('ملخص الفكرة')
                            ->columnSpanFull(),

                        TextEntry::make('user.name')
                            ->label('صاحب الفكرة')
                            ->default('غير معروف'),

                        TextEntry::make('user.email')
                            ->label('البريد الإلكتروني'),

                        TextEntry::make('created_at')
                            ->label('تاريخ التقديم')
                            ->date(),
                    ]),

                Section::make('الدول المستهدفة')
                    ->schema([
                        TextEntry::make('countries')
                            ->label('الدول')
                            ->badge()
                            ->getStateUsing(function ($record) {
                                $options = __('idea.steps.step2.options');
                                return $record->countries->map(function ($country) use ($options) {
                                    $found = collect($options)->firstWhere('code', $country->country);
                                    $name = $found['name'] ?? $country->country;
                                    return $name;
                                })->toArray();
                            }),
                    ]),

                Section::make('الأرباح والتكاليف')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('profits')
                            ->label('نوع الأرباح')
                            ->getStateUsing(
                                fn($record) =>
                                optional($record->profits->first())->profit_type === 'annual'
                                    ? 'سنوية'
                                    : 'مرة واحدة'
                            ),

                        TextEntry::make('costs')
                            ->label('نوع التكاليف')
                            ->getStateUsing(
                                fn($record) =>
                                optional($record->costs->first())->cost_type === 'annual'
                                    ? 'سنوية'
                                    : 'مرة واحدة'
                            ),
                    ]),

                Section::make('الموارد')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('resources.company')
                            ->label('شركة')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.space_type')
                            ->label('نوع المكان')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.staff')
                            ->label('موظفين')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.staff_number')
                            ->label('عدد الموظفين')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.workers')
                            ->label('عمال')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.workers_number')
                            ->label('عدد العمال')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.executive_spaces')
                            ->label('مكاتب إدارية')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.executive_spaces_type')
                            ->label('نوع المكاتب الإدارية')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.equipment')
                            ->label('معدات')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.equipment_type')
                            ->label('نوع المعدات')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.software')
                            ->label('برامج')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                        TextEntry::make('resources.software_type')
                            ->label('نوع البرامج')
                            ->formatStateUsing(fn($state) => filled($state) ? $state : '–'),

                        TextEntry::make('resources.website')
                            ->label('موقع إلكتروني')
                            ->formatStateUsing(fn($state) => $state === 'yes' ? 'نعم' : 'لا'),

                    ]),



                Section::make('المصروفات')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('expenses.company')->label('الشركة'),
                        TextEntry::make('expenses.assets')->label('الأصول'),
                        TextEntry::make('expenses.salaries')->label('الرواتب'),
                        TextEntry::make('expenses.operating')->label('تشغيلية'),
                        TextEntry::make('expenses.other')->label('أخرى'),
                    ]),

                Section::make('المساهمة والعائد')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('contributions.0.contribute_type')
                            ->label('نوع المساهمة'),

                        TextEntry::make('returns.return_type')
                            ->label('نوع العائد'),
                    ]),

                Section::make('المرفقات')
                    ->schema([
                        TextEntry::make('attachments.original_name')
                            ->label(''),
                    ]),


            ]);
    }
}
