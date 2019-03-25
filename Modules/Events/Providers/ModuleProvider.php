<?php

namespace TypiCMS\Modules\Events\Providers;

use Eluceo\iCal\Component\Calendar as EluceoCalendar;
use Eluceo\iCal\Component\Event as EluceoEvent;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Events\Composers\SidebarViewComposer;
use TypiCMS\Modules\Events\Facades\Events;
use TypiCMS\Modules\Events\Models\Event;
use TypiCMS\Modules\Events\Repositories\EloquentEvent;
use TypiCMS\Modules\Events\Services\Calendar;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.events'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['events' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'events');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/events'),
        ], 'views');

        AliasLoader::getInstance()->alias('Events', Events::class);

        // Observers
        Event::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('events::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('events');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Events', EloquentEvent::class);

        /*
         * Calendar service
         */
        $app->bind('TypiCMS\Modules\Events\Services\Calendar', function () {
            return new Calendar(
                new EluceoCalendar('TypiCMS'),
                new EluceoEvent()
            );
        });
    }
}
