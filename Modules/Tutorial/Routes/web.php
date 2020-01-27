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

Route::get('/tutorials', 'TutorialController@index');
Route::get('/tutorials/{category}', 'TutorialController@category');
Route::get('/tutorial/{slug}', 'TutorialController@show');
