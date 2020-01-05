<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('settings')->as('setting.')->group(function() {
    // Env Configuration Varaible
    Route::get('/', 'SettingController@index')->name('index');
    Route::get('/env', 'EnvController@index')->name('env');
    Route::post('/env', 'EnvController@store')->name('env.store');
    Route::post('/reload-env', 'EnvController@update')->name('env.reload');
});
