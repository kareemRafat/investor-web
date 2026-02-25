<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\IdeasStats;
use App\Filament\Widgets\InvestorsStats;
use App\Filament\Widgets\RevenueStats;
use App\Filament\Widgets\SubscriptionOverview;
use App\Filament\Widgets\UsersStats;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->favicon(asset('images/favicon.png'))
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->font('Readex Pro')
            ->colors([
                'primary' => Color::Purple,
                'blue' => Color::Blue,
                'danger' => Color::Red,
                'gray' => Color::Zinc,
                'rose' => Color::Rose,
                'indigo' => Color::Indigo,
                'purple' => Color::Purple,
                'info' => Color::Blue,
                'success' => Color::Green,
                'warning' => Color::Amber,
                'violet' => Color::Violet,
                'yellow' => Color::Yellow,
                'orange' => Color::Orange,
                'teal' => Color::Teal,
                'lime' => Color::Lime,
                'lightgray' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
                UsersStats::class,
                IdeasStats::class,
                InvestorsStats::class,
                RevenueStats::class,
                SubscriptionOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->spa(hasPrefetching: true)
            ->databaseTransactions()
            ->darkMode(false);
    }
}
