<?php

namespace Modules\Tutorial\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Inertia\Inertia;
use Modules\Core\Events\BuildingSidebar;
use Modules\Tutorial\Entities\Category;
use Modules\Tutorial\Events\Handlers\RegisterTutorialSidebar;

class TutorialServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerProviders();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if (class_exists('Breadcrumbs')) {
            require __DIR__ . '/../Routes/breadcrumbs.php';
        }

        Inertia::share('tutorial_categories', function () {
            return \Cache::rememberForever('tutorial_categories', function () {
                return Category::all();
            });
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen(BuildingSidebar::class, RegisterTutorialSidebar::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    protected function registerProviders()
    {
        foreach ($this->provides() as $provider) {
            $this->app->register($provider);
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('tutorials.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'tutorial'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/tutorials');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/tutorials';
        }, \Config::get('view.paths')), [$sourcePath]), 'tutorial');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/tutorials');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'tutorial');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'tutorial');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            RouteServiceProvider::class
        ];
    }
}
