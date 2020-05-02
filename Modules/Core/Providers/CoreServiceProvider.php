<?php

namespace Modules\Core\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Maatwebsite\Sidebar\SidebarServiceProvider as BaseSidebarServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\Handlers\RegisterCoreSidebar;
use Modules\Core\Http\Middleware\AdminThemeMiddleware;
use Modules\Core\Http\Middleware\RouteMiddleware;
use Modules\Core\Http\Middleware\WebThemeMiddleware;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Application locale defaults for various components
         *
         * These will be overridden by LocaleMiddleware if the session local is set
         */

        // setLocale for php. Enables ->formatLocalized() with localized values for dates
        setlocale(LC_TIME, config('app.locale_php'));

        // setLocale to use Carbon source locales. Enables diffForHumans() localized
        Carbon::setLocale(config('app.locale'));

        /*
         * Set the session variable for whether or not the app is using RTL support
         * For use in the blade directive in BladeServiceProvider
         */
        if (! app()->runningInConsole()) {
            if (config('locale.languages')[config('app.locale')][2]) {
                session(['lang-rtl' => true]);
            } else {
                session()->forget('lang-rtl');
            }
        }

        // Force SSL in production
        if ($this->app->environment() === 'production') {
            URL::forceScheme('https');
        }

        // Set the default string length for Laravel5.4
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        // Set the default template for Pagination to use the included TailwindUI template
        \Illuminate\Pagination\AbstractPaginator::defaultView('pagination::default');
        \Illuminate\Pagination\AbstractPaginator::defaultSimpleView('pagination::simple-default');

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerBladeView();
        $this->registerProviders();
        $this->registerFactories();
        $this->registerHelper();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->pushMiddlewareToGroup('web', WebThemeMiddleware::class);
        $this->app['router']->aliasMiddleware('theme', RouteMiddleware::class);
        $this->app['router']->middlewareGroup('admin', [
            'auth',
            'password_expires',
            'permission:view-backend',
            \Maatwebsite\Sidebar\Middleware\ResolveSidebars::class,
            AdminThemeMiddleware::class
        ]);

        $this->app->singleton('modulesList', function () {
            return [
                'core',
                'dashboard',
                'media',
                'menu',
                'page',
                'setting',
                'logger',
                'translation',
                'user',
                'history',
            ];
        });
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
     * Custom Blade Directives
     *
     * @return void
     */
    protected function registerBladeView()
    {
        /*
         * The block of code inside this directive indicates
         * the project is currently running in demo mode.
         */
        Blade::if('demo', function () {
            return config('app.demo');
        });

        /*
         * The block of code inside this directive indicates
         * the chosen language requests RTL support.
         */
        Blade::if('langrtl', function ($session_identifier = 'lang-rtl') {
            return session()->has($session_identifier);
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('core.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'core'
        );
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/core');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'core');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'core');
        }
    }

    /**
     * Register All Helpers.
     *
     * @return void
     */
    public function registerHelper()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
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
            ThemeServiceProvider::class,
            BaseSidebarServiceProvider::class,
            SidebarServiceProvider::class,
            ViewServiceProvider::class,
            FoundationServiceProvider::class
        ];
    }
}
