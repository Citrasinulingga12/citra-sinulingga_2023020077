<?php

namespace App\Providers\Filament;

use App\Filament\Ujian\Pages\HistoriUjianPage;
use App\Filament\Ujian\Pages\Login;
use App\Filament\Ujian\Pages\RekapUjianPage;
use App\Filament\Ujian\Pages\UjianPage;
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
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UjianPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('ujian')
            ->path('ujian')
            ->login(Login::class)
            ->guard('student')
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->discoverResources(in: app_path('Filament/Ujian/Resources'), for: 'App\Filament\Ujian\Resources')
            ->discoverPages(in: app_path('Filament/Ujian/Pages'), for: 'App\Filament\Ujian\Pages')
            ->pages([
                Dashboard::class,
                Login::class,
                UjianPage::class,
                RekapUjianPage::class,
                HistoriUjianPage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Ujian/Widgets'), for: 'App\Filament\Ujian\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
