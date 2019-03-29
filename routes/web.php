<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/slack/result', function () { return view('pages::public.slack-invite'); })->name('slack.result');
Route::post('/slack/invite','SlackInvitationController@sendInvitation')->name('slack.invite');

foreach (locales() as $lang) {
    Route::group(['middleware' => 'auth'], function (\Illuminate\Routing\Router $router) use ($lang) {
        $router->get($lang .'/account', 'UserController@account')->name('users.account');
        $router->put('/update-account/{id}', 'UserController@updateAccount')->name('users.update-account');
        $router->get($lang .'/update-password', 'UserController@password')->name('users.password');
        $router->post('/update-password/{id}', 'UserController@updatePassword')->name('users.update-password');
    });

    Route::get($lang .'/contact', function () { return view('pages::public.contact');})->name('contact');
}

Route::get('/auth/{provider}', '\TypiCMS\Modules\Users\Http\Controllers\LoginController@redirectToProvider');
Route::get('/callback/{provider}', '\TypiCMS\Modules\Users\Http\Controllers\LoginController@handleProviderCallback');
