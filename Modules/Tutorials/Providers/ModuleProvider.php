<?php

namespace TypiCMS\Modules\Tutorials\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Tutorials\Composers\SidebarViewComposer;
use TypiCMS\Modules\Tutorials\Facades\Tutorials;
use TypiCMS\Modules\Tutorials\Models\Tutorial;
use TypiCMS\Modules\Tutorials\Observers\TutorialObserver;
use TypiCMS\Modules\Tutorials\Repositories\EloquentTutorial;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.tutorials'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['tutorials' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'tutorials');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        AliasLoader::getInstance()->alias('Tutorials', Tutorials::class);

        // Observers
        Tutorial::observe(new SlugObserver());
        Tutorial::observe(new TutorialObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('tutorials::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('tutorials');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Tutorials', EloquentTutorial::class);
    }
}
