<?php

namespace App\Filament\Widgets;

use App\Enums\PlanType;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SubscriptionOverview extends StatsOverviewWidget
{
    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        $counts = User::query()
            ->selectRaw('plan_type, count(*) as count')
            ->groupBy('plan_type')
            ->get()
            ->pluck('count', 'plan_type.value');

        $monthlyCount = $counts->get(PlanType::MONTHLY->value, 0);
        $yearlyCount = $counts->get(PlanType::YEARLY->value, 0);
        $freeCount = $counts->get(PlanType::FREE->value, 0);

        return [
            Stat::make('المشتركون في الباقة الشهرية (Emerald)', $monthlyCount)
                ->description('عدد المشتركين الفعالين في الباقة الشهرية')
                ->icon('heroicon-o-credit-card')
                ->color('success'),

            Stat::make('المشتركون في الباقة السنوية (Ruby)', $yearlyCount)
                ->description('عدد المشتركين الفعالين في الباقة السنوية')
                ->icon('heroicon-o-sparkles')
                ->color('warning'),

            Stat::make('المستخدمون في الباقة المجانية', $freeCount)
                ->description('عدد المستخدمين الذين لم يشتركوا بعد')
                ->icon('heroicon-o-user')
                ->color('gray'),
        ];
    }
}
