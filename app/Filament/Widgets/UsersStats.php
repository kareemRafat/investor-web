<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersStats extends StatsOverviewWidget
{
    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي المستخدمين', User::count())
                ->icon('heroicon-o-users')
                ->color('primary')
                ->description('عدد الإجمالي للمستخدمين المسجلين ')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($this->getUserChartData())
                ->columnSpanFull(),
        ];
    }

    protected function getUserChartData(): array
    {
        return User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();
    }
}
