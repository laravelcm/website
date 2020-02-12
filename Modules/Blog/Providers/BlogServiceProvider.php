<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Blog\Events\Handlers\RegisterBlogSidebar;
use Modules\Core\Events\BuildingSidebar;

class BlogServiceProvider extends ServiceProvider
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
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen(BuildingSidebar::class, RegisterBlogSidebar::class);
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
            __DIR__.'/../Config/config.php' => config_path('blog.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'blog'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/blog');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/blog';
        }, \Config::get('view.paths')), [$sourcePath]), 'blog');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/blog');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'blog');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'blog');
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
