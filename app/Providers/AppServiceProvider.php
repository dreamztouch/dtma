<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Bloodbank;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $totalBloodbank = Bloodbank::count();
        view()->share('totalBloodbank', $totalBloodbank);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
