<?php

namespace TypiCMS\Modules\Users\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Users\Http\Controllers';

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
            $router->middleware('web')->group(function (Router $router) {

                // Registration
                $router->get('register', 'RegisterController@showRegistrationForm')->name('register');
                $router->post('register', 'RegisterController@register');
                $router->get('activate/{token}', 'RegisterController@activate')->name('activate');

                // Login
                $router->get('login', 'LoginController@showLoginForm')->name('login');
                $router->post('login', 'LoginController@login');

                // Logout
                $router->post('logout', 'LoginController@logout')->name('logout');

                // Request new password
                $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
                $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

                // Set new password
                $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                $router->post('password/reset', 'ResetPasswordController@reset');
            });

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('users', 'AdminController@index')->name('admin::index-users')->middleware('can:see-all-users');
                $router->get('users/create', 'AdminController@create')->name('admin::create-user')->middleware('can:create-user');
                $router->get('users/{user}/edit', 'AdminController@edit')->name('admin::edit-user')->middleware('can:update-user');
                $router->post('users', 'AdminController@store')->name('admin::store-user')->middleware('can:create-user');
                $router->put('users/{user}', 'AdminController@update')->name('admin::update-user')->middleware('can:update-user');
            });

            /*
             * API routes
             */
            $router->middleware('api')->prefix('api')->group(function (Router $router) {
                $router->middleware('auth:api')->group(function (Router $router) {
                    $router->get('users', 'ApiController@index')->middleware('can:see-all-users');
                    $router->post('users/current/updatepreferences', 'ApiController@updatePreferences')->middleware('can:update-preferences');
                    $router->patch('users/{user}', 'ApiController@updatePartial')->middleware('can:update-user');
                    $router->delete('users/{user}', 'ApiController@destroy')->middleware('can:delete-user');
                });
            });
        });
    }
}
