<?php

namespace App\Filament\Resources\Investors;

use UnitEnum;
use BackedEnum;
use App\Models\Investor;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Investors\Pages\EditInvestor;
use App\Filament\Resources\Investors\Pages\ViewInvestor;
use App\Filament\Resources\Investors\Pages\ListInvestors;
use App\Filament\Resources\Investors\Schemas\InvestorForm;
use App\Filament\Resources\Investors\Tables\InvestorsTable;

class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartPie;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ChartPie;

    protected static string|UnitEnum|null $navigationGroup = 'إدارة الأفكار وعروض الإستثمار';

    protected static ?int $navigationSort = 6;

    protected static ?string $modelLabel = 'طلب الإستثمار';

    protected static ?string $pluralModelLabel = 'عروض الإستثمار';

    public static function form(Schema $schema): Schema
    {
        return InvestorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvestors::route('/'),
            'view' => ViewInvestor::route('/{record}'),
            'edit' => EditInvestor::route('/{record}/edit'),
        ];
    }
}
