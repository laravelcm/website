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

Route::prefix('blog')->as('blog.')->group(function() {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/category/{slug}', 'BlogController@category')->name('category');
    Route::get('/{slug}', 'BlogController@post')->name('post');
});
