<?php

namespace TypiCMS\Modules\Forums\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Forums\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('forums')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-forums');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::forum');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('forums', 'AdminController@index')->name('admin::index-forums')->middleware('can:see-all-forums');
                $router->get('forums/create', 'AdminController@create')->name('admin::create-forum')->middleware('can:create-forum');
                $router->get('forums/{forum}/edit', 'AdminController@edit')->name('admin::edit-forum')->middleware('can:update-forum');
                $router->post('forums', 'AdminController@store')->name('admin::store-forum')->middleware('can:create-forum');
                $router->put('forums/{forum}', 'AdminController@update')->name('admin::update-forum')->middleware('can:update-forum');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('forums', 'ApiController@index')->middleware('can:see-all-forums');
                    $router->patch('forums/{forum}', 'ApiController@updatePartial')->middleware('can:update-forum');
                    $router->delete('forums/{forum}', 'ApiController@destroy')->middleware('can:delete-forum');

                    $router->get('forums/{forum}/files', 'ApiController@files')->middleware('can:update-forum');
                    $router->post('forums/{forum}/files', 'ApiController@attachFiles')->middleware('can:update-forum');
                    $router->delete('forums/{forum}/files/{file}', 'ApiController@detachFile')->middleware('can:update-forum');
                });
            });
        });
    }
}
