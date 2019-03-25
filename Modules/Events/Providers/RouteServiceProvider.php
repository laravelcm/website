<?php

namespace TypiCMS\Modules\Events\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Events\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('events')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-events');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::event');
                            $router->get($uri.'/{slug}/ics', $options + ['uses' => 'PublicController@ics'])->name($lang.'::event-ics');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('events', 'AdminController@index')->name('admin::index-events')->middleware('can:see-all-events');
                $router->get('events/create', 'AdminController@create')->name('admin::create-event')->middleware('can:create-event');
                $router->get('events/{event}/edit', 'AdminController@edit')->name('admin::edit-event')->middleware('can:update-event');
                $router->get('events/{event}/files', 'AdminController@files')->name('admin::edit-event-files')->middleware('can:update-event');
                $router->post('events', 'AdminController@store')->name('admin::store-event')->middleware('can:create-event');
                $router->put('events/{event}', 'AdminController@update')->name('admin::update-event')->middleware('can:update-event');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('events', 'ApiController@index')->middleware('can:see-all-events');
                    $router->patch('events/{event}', 'ApiController@updatePartial')->middleware('can:update-event');
                    $router->delete('events/{event}', 'ApiController@destroy')->middleware('can:delete-event');

                    $router->get('events/{event}/files', 'ApiController@files')->middleware('can:update-event');
                    $router->post('events/{event}/files', 'ApiController@attachFiles')->middleware('can:update-event');
                    $router->delete('events/{event}/files/{file}', 'ApiController@detachFile')->middleware('can:update-event');
                });
            });
        });
    }
}
