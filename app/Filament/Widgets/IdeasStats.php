<?php

namespace App\Filament\Widgets;

use App\Enums\IdeaStatus;
use App\Models\Idea;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class IdeasStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // إجمالي الأفكار
            Stat::make('إجمالي الأفكار', Idea::count())
                ->icon('heroicon-o-light-bulb')
                ->color('primary')
                ->chart($this->getIdeasChart())
                ->description('عدد جميع الأفكار المسجلة')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),

            // أفكار موافق عليها
            Stat::make(
                'الأفكار الموافق عليها',
                Idea::where('status', IdeaStatus::APPROVED)->count()
            )
                ->color(IdeaStatus::APPROVED->getColor())
                ->chart($this->getIdeasChart(IdeaStatus::APPROVED))
                ->description('أفكار تم اعتمادها')
                ->descriptionIcon('heroicon-m-check-circle'),

            // أفكار معلقة
            Stat::make(
                'الأفكار المعلقة',
                Idea::where('status', IdeaStatus::PENDING)->count()
            )
                ->color(IdeaStatus::PENDING->getColor())
                ->chart($this->getIdeasChart(IdeaStatus::PENDING))
                ->description('أفكار قيد المراجعة')
                ->descriptionIcon('heroicon-m-clock'),

            // أفكار مرفوضة
            Stat::make(
                'الأفكار المرفوضة',
                Idea::where('status', IdeaStatus::REJECTED)->count()
            )
                ->color(IdeaStatus::REJECTED->getColor())
                ->chart($this->getIdeasChart(IdeaStatus::REJECTED))
                ->description('أفكار تم رفضها')
                ->descriptionIcon('heroicon-m-x-circle'),
        ];
    }

    protected function getIdeasChart(?IdeaStatus $status = null): array
    {
        $query = Idea::query()
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
