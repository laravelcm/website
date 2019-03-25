<?php

namespace TypiCMS\Modules\Tutorials\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Tutorials\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('tutorials')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-tutorials');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::tutorial');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('tutorials', 'AdminController@index')->name('admin::index-tutorials')->middleware('can:see-all-tutorials');
                $router->get('tutorials/create', 'AdminController@create')->name('admin::create-tutorial')->middleware('can:create-tutorial');
                $router->get('tutorials/{tutorial}/edit', 'AdminController@edit')->name('admin::edit-tutorial')->middleware('can:update-tutorial');
                $router->post('tutorials', 'AdminController@store')->name('admin::store-tutorial')->middleware('can:create-tutorial');
                $router->put('tutorials/{tutorial}', 'AdminController@update')->name('admin::update-tutorial')->middleware('can:update-tutorial');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('tutorials', 'ApiController@index')->middleware('can:see-all-tutorials');
                    $router->patch('tutorials/{tutorial}', 'ApiController@updatePartial')->middleware('can:update-tutorial');
                    $router->delete('tutorials/{tutorial}', 'ApiController@destroy')->middleware('can:delete-tutorial');

                    $router->get('tutorials/{tutorial}/files', 'ApiController@files')->middleware('can:update-tutorial');
                    $router->post('tutorials/{tutorial}/files', 'ApiController@attachFiles')->middleware('can:update-tutorial');
                    $router->delete('tutorials/{tutorial}/files/{file}', 'ApiController@detachFile')->middleware('can:update-tutorial');
                });
            });
        });
    }
}
