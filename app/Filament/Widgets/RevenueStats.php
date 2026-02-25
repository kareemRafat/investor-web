<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class RevenueStats extends StatsOverviewWidget
{
    protected static bool $isLazy = true;

        protected function getStats(): array
        {
            $stats = Transaction::query()
                ->selectRaw("
                    SUM(CASE WHEN status = 'completed' THEN amount ELSE 0 END) as total_revenue,
                    SUM(CASE WHEN status = 'completed' AND MONTH(created_at) = ? AND YEAR(created_at) = ? THEN amount ELSE 0 END) as monthly_revenue,
                    COUNT(*) as total_count,
                    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as successful_count
                ", [now()->month, now()->year])
                ->first();
    
            $totalRevenue = (float) ($stats->total_revenue ?? 0);
            $monthlyRevenue = (float) ($stats->monthly_revenue ?? 0);
            $totalTransactions = (int) ($stats->total_count ?? 0);
            $successfulTransactions = (int) ($stats->successful_count ?? 0);
    
            $successRate = $totalTransactions > 0
                ? round(($successfulTransactions / $totalTransactions) * 100, 1)
                : 0;
    
            return [            Stat::make('إجمالي الأرباح', Number::currency($totalRevenue, 'USD', 'en'))
                ->description('إجمالي المبالغ المحصلة من البداية')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success')
                ->chart($this->getRevenueChartData()),

            Stat::make('أرباح الشهر الحالي', Number::currency($monthlyRevenue, 'USD', 'en'))
                ->description('الأرباح المحققة خلال هذا الشهر')
                ->icon('heroicon-o-calendar')
                ->color('info'),

            Stat::make('نسبة نجاح العمليات', $successRate.'%')
                ->description($successfulTransactions.' عملية ناجحة من أصل '.$totalTransactions)
                ->descriptionIcon($successRate > 80 ? 'heroicon-m-check-circle' : 'heroicon-m-exclamation-circle')
                ->color($successRate > 80 ? 'success' : 'warning'),
        ];
    }

    protected function getRevenueChartData(): array
    {
        $data = Transaction::where('status', 'completed')
            ->where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total')
            ->toArray();

        return array_map('floatval', $data);
    }
}
