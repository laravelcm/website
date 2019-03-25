<?php

namespace TypiCMS\Modules\Users\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Users\Composers\SidebarViewComposer;
use TypiCMS\Modules\Users\Facades\Users;
use TypiCMS\Modules\Users\Repositories\EloquentUser;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.users'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['users' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'users');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/users'),
        ], 'views');

        AliasLoader::getInstance()->alias('Users', Users::class);

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Users', EloquentUser::class);
    }
}
