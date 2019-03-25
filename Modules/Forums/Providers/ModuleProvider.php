<?php

namespace TypiCMS\Modules\Forums\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Forums\Composers\SidebarViewComposer;
use TypiCMS\Modules\Forums\Facades\Forums;
use TypiCMS\Modules\Forums\Models\Forum;
use TypiCMS\Modules\Forums\Repositories\EloquentForum;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.forums'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['forums' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'forums');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        AliasLoader::getInstance()->alias('Forums', Forums::class);

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('forums::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('forums');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Forums', EloquentForum::class);
    }
}
