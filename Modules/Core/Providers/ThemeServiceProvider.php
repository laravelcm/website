<?php

namespace Modules\Core\Providers;

use App;
use File;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Console\ThemeListCommand;
use Modules\Core\Contracts\ThemeContract;
use Modules\Core\Managers\Theme;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!File::exists(public_path('Themes')) && config('core.symlink') && File::exists(config('core.theme_path'))) {
            App::make('files')->link(config('core.theme_path'), public_path('Themes'));
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTheme();
        $this->consoleCommand();
        $this->registerMiddleware();

        /*
        * Create aliases for the dependency.
        */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        // Create aliase for the package provider
        $loader->alias('Theme', \Modules\Core\Facades\Theme::class);
    }

    /**
     * Add Theme Types Middleware.
     *
     * @return void
     */
    public function registerMiddleware()
    {
        if (config('core.types.enable')) {
            $themeTypes = config('core.types.middleware');
            foreach ($themeTypes as $middleware => $themeName) {
                $this->app['router']->aliasMiddleware($middleware, '\Modules\Core\Http\Middleware\RouteMiddleware:'.$themeName);
            }
        }
    }

    /**
     * Register theme required components .
     *
     * @return void
     */
    public function registerTheme()
    {
        $this->app->singleton(ThemeContract::class, function ($app) {
            $theme = new Theme($app, $this->app['view']->getFinder(), $this->app['config'], $this->app['translator']);

            return $theme;
        });
    }

    /**
     * Add Commands.
     *
     * @return void
     */
    public function consoleCommand()
    {
        $this->registerThemeGeneratorCommand();
        $this->registerThemeListCommand();
        // Assign commands.
        $this->commands('lb-theme.create', 'lb-theme.list');
    }

    /**
     * Register generator command.
     *
     * @return void
     */
    public function registerThemeGeneratorCommand()
    {
        $this->app->singleton('lb-theme.create', function ($app) {
            return new \Modules\Core\Console\ThemeGeneratorCommand($app['config'], $app['files']);
        });
    }

    /**
     * Register theme list command.
     *
     * @return void
     */
    public function registerThemeListCommand()
    {
        $this->app->singleton('lb-theme.list', ThemeListCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
