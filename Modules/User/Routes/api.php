<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('verify/token', 'UserController@verifyRecaptchaToken')->name('verifyToken');
Route::get('roles', 'RoleController@index')->name('api.roles.index');
Route::get('users', 'UserController@index')->name('api.users.index');
