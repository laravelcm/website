<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\Tutorial;
use App\Observers\PackageObserver;
use App\Observers\TutorialObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Package::observe(PackageObserver::class);
        Tutorial::observe(TutorialObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
