<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Bloodbank;
use App\Ambulance;
use App\Hospital;

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
        $totalAmbulance = Ambulance::count();
        $totalHospital = Hospital::count();
        $data = array(
            'totalBloodbank' => $totalBloodbank,
            'totalAmbulance' => $totalAmbulance,
            'totalHospital'  => $totalHospital,
        );

        view()->share('data', $data);
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
