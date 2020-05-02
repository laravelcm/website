<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Composers\GlobalComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Global
        view()->composer(
        // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        // Backend
        view()->creator('partials._sidebar', \Modules\Core\Composers\SidebarCreator::class);
        view()->creator('partials._sidebar-mobile', \Modules\Core\Composers\SidebarCreator::class);
    }
}
