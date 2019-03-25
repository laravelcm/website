<?php

namespace TypiCMS\Modules\Pages\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Pages\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return null
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('pages', 'AdminController@index')->name('admin::index-pages')->middleware('can:see-all-pages');
                $router->get('pages/create', 'AdminController@create')->name('admin::create-page')->middleware('can:create-page');
                $router->get('pages/{page}/edit', 'AdminController@edit')->name('admin::edit-page')->middleware('can:update-page');
                $router->post('pages', 'AdminController@store')->name('admin::store-page')->middleware('can:create-page');
                $router->put('pages/{page}', 'AdminController@update')->name('admin::update-page')->middleware('can:update-page');

                $router->get('pages/{page}/sections/create', 'SectionsAdminController@create')->name('admin::create-page_section')->middleware('can:create-page_section');
                $router->get('pages/{page}/sections/{section}/edit', 'SectionsAdminController@edit')->name('admin::edit-page_section')->middleware('can:update-page_section');
                $router->post('pages/{page}/sections', 'SectionsAdminController@store')->name('admin::store-page_section')->middleware('can:create-page_section');
                $router->put('pages/{page}/sections/{section}', 'SectionsAdminController@update')->name('admin::update-page_section')->middleware('can:update-page_section');
                $router->post('pages/{page}/sections/sort', 'SectionsAdminController@sort')->name('admin::sort-page_sections');

                $router->get('sections', 'SectionsAdminController@index')->name('admin::index-page_sections')->middleware('can:see-all-page_sections');
                $router->delete('sections/{section}', 'SectionsAdminController@destroyMultiple')->name('admin::destroy-page_section')->middleware('can:delete-page_section');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('pages', 'ApiController@index')->middleware('can:see-all-pages');
                    $router->patch('pages/{page}', 'ApiController@updatePartial')->middleware('can:update-page');
                    $router->post('pages/sort', 'ApiController@sort')->middleware('can:update-page');
                    $router->delete('pages/{page}', 'ApiController@destroy')->middleware('can:delete-page');

                    $router->get('pages/{page}/files', 'ApiController@files')->middleware('can:update-page');
                    $router->post('pages/{page}/files', 'ApiController@attachFiles')->middleware('can:update-page');
                    $router->delete('pages/{page}/files/{file}', 'ApiController@detachFile')->middleware('can:update-page');

                    $router->get('pages/{page}/sections', 'SectionsApiController@index')->middleware('can:see-all-page_sections');
                    $router->patch('pages/{page}/sections/{section}', 'SectionsApiController@updatePartial')->middleware('can:update-page_section');
                    $router->delete('pages/{page}/sections/{section}', 'SectionsApiController@destroy')->middleware('can:delete-page_section');

                    $router->get('page_sections/{section}/files', 'SectionsApiController@files')->middleware('can:update-page_section');
                    $router->post('page_sections/{section}/files', 'SectionsApiController@attachFiles')->middleware('can:update-page_section');
                    $router->delete('page_sections/{section}/files/{file}', 'SectionsApiController@detachFile')->middleware('can:update-page_section');
                });
            });

            /*
             * Front office routes
             */
            $router->middleware('public')->group(function (Router $router) {
                if (config('typicms.main_locale_in_url')) {
                    if (config('typicms.lang_chooser')) {
                        $router->get('/', 'PublicController@langChooser');
                    } else {
                        $router->get('/', 'PublicController@redirectToHomepage');
                    }
                }
                foreach (locales() as $locale) {
                    if (
                        config('app.fallback_locale') != $locale ||
                        config('typicms.main_locale_in_url')
                    ) {
                        $router->prefix($locale)->get('{uri}', 'PublicController@uri')->where('uri', '(.*)');
                    }
                }
                $router->get('{uri}', 'PublicController@uri')->where('uri', '(.*)');
            });
        });
    }
}
