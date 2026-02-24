<?php

namespace App\Filament\Widgets;

use App\Enums\InvestorStatus;
use App\Models\Investor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InvestorsStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // إجمالي عروض الاستثمار
            Stat::make('إجمالي عروض الاستثمار', Investor::count())
                ->icon('heroicon-o-banknotes')
                ->color('primary')
                ->chart($this->getInvestorsChart())
                ->description('عدد جميع عروض الاستثمار المسجلة')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

            // عروض موافق عليها
            Stat::make(
                'العروض الموافق عليها',
                Investor::where('status', InvestorStatus::APPROVED)->count()
            )
                ->color(InvestorStatus::APPROVED->getColor())
                ->chart($this->getInvestorsChart(InvestorStatus::APPROVED))
                ->description('عروض تم اعتمادها')
                ->descriptionIcon('heroicon-m-check-circle'),

            // عروض معلقة
            Stat::make(
                'العروض المعلقة',
                Investor::where('status', InvestorStatus::PENDING)->count()
            )
                ->color(InvestorStatus::PENDING->getColor())
                ->chart($this->getInvestorsChart(InvestorStatus::PENDING))
                ->description('عروض قيد المراجعة')
                ->descriptionIcon('heroicon-m-clock'),

            // عروض مرفوضة
            Stat::make(
                'العروض المرفوضة',
                Investor::where('status', InvestorStatus::REJECTED)->count()
            )
                ->color(InvestorStatus::REJECTED->getColor())
                ->chart($this->getInvestorsChart(InvestorStatus::REJECTED))
                ->description('عروض تم رفضها')
                ->descriptionIcon('heroicon-m-x-circle'),
        ];
    }

    protected function getInvestorsChart(?InvestorStatus $status = null): array
    {
        $query = Investor::query()
            ->where('created_at', '>=', now()->subDays(7));

        if ($status) {
            $query->where('status', $status);
        }

        return $query
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();
    }
}
