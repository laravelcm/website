<?php

namespace TypiCMS\Modules\Packages\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Packages\Composers\SidebarViewComposer;
use TypiCMS\Modules\Packages\Facades\Packages;
use TypiCMS\Modules\Packages\Models\Package;
use TypiCMS\Modules\Packages\Observers\PackageObserver;
use TypiCMS\Modules\Packages\Repositories\EloquentPackage;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.packages'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['packages' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'packages');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        AliasLoader::getInstance()->alias('Packages', Packages::class);

        // Observers
        Package::observe(new SlugObserver());
        Package::observe(new PackageObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('packages::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('packages');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Packages', EloquentPackage::class);
    }
}
