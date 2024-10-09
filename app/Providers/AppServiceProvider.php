<?php

namespace App\Providers;

use App\Http\Controllers\back\FooterController;
use App\Models\Footer;
use App\Models\Laporan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('back.layout.sidebar', function ($view) {
            $laporanCount = Laporan::count();
            $view->with('laporanCount', $laporanCount);
        });
        // Menyediakan footerData ke view front.layout.footer
        View::composer('front.layout.footer', function ($view) {
            $footerData = Footer::all();
            $view->with('footerData', $footerData);
        });

        // Menggunakan view composer untuk menyediakan data footer ke semua views yang memerlukan

    }
}
