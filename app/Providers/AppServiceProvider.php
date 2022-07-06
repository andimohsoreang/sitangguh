<?php

namespace App\Providers;

use App\Models\LaporanBencana;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function ($view) {
            $view->with('lpbencana', LaporanBencana::where('status', 'tunggu')->count());
        });
    }
}
