<?php

namespace TypiCMS\Modules\Menus\Providers;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Menus\Composers\SidebarViewComposer;
use TypiCMS\Modules\Menus\Facades\Menulinks;
use TypiCMS\Modules\Menus\Facades\Menus;
use TypiCMS\Modules\Menus\Models\Menu;
use TypiCMS\Modules\Menus\Repositories\EloquentMenu;
use TypiCMS\Modules\Menus\Repositories\EloquentMenulink;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.menus'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/config-menulinks.php', 'typicms.menulinks'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['menus' => []], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'menus');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/menus'),
        ], 'views');

        AliasLoader::getInstance()->alias('Menus', Menus::class);
        AliasLoader::getInstance()->alias('Menulinks', Menulinks::class);

        Blade::directive('menu', function ($name) {
            return "<?php echo Menus::render($name) ?>";
        });

        Blade::directive('menuHeader', function ($name) {
            return "<?php echo Menus::renderHeader($name) ?>";
        });

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

        $app->singleton('TypiCMS.menus', function (Application $app) {
            return $app
                ->make('Menus')
                ->published()
                ->with([
                    'menulinks' => function (HasMany $query) {
                        $query->published();
                    },
                    'menulinks.page',
                ])
                ->findAll()
                ->transform(function (Menu $menu) {
                    $menu->menulinks = app('Menus')->prepare($menu->menulinks)->nest();

                    return $menu;
                });
        });

        $app->bind('Menus', EloquentMenu::class);
        $app->bind('Menulinks', EloquentMenulink::class);
    }
}
