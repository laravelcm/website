<?php

namespace TypiCMS\Modules\Packages\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Packages\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return null
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {

            /*
             * Front office routes
             */
            if ($page = TypiCMS::getPageLinkedToModule('packages')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-packages');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::package');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('packages', 'AdminController@index')->name('admin::index-packages')->middleware('can:see-all-packages');
                $router->get('packages/create', 'AdminController@create')->name('admin::create-package')->middleware('can:create-package');
                $router->get('packages/{package}/edit', 'AdminController@edit')->name('admin::edit-package')->middleware('can:update-package');
                $router->post('packages', 'AdminController@store')->name('admin::store-package')->middleware('can:create-package');
                $router->put('packages/{package}', 'AdminController@update')->name('admin::update-package')->middleware('can:update-package');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('packages', 'ApiController@index')->middleware('can:see-all-packages');
                    $router->patch('packages/{package}', 'ApiController@updatePartial')->middleware('can:update-package');
                    $router->delete('packages/{package}', 'ApiController@destroy')->middleware('can:delete-package');

                    $router->get('packages/{package}/files', 'ApiController@files')->middleware('can:update-package');
                    $router->post('packages/{package}/files', 'ApiController@attachFiles')->middleware('can:update-package');
                    $router->delete('packages/{package}/files/{file}', 'ApiController@detachFile')->middleware('can:update-package');
                });
            });
        });
    }
}
