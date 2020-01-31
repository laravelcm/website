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

use Modules\Forum\Http\Controllers\Frontend\ForumController;

Route::prefix('forum')->group(function() {
    Route::get('/', [ForumController::class, 'index']);
    Route::redirect('/channels', '/forum');
    Route::get('/channels/{slug}', [ForumController::class, 'channel']);

    Route::prefix('topics')->group(function () {
        Route::get('/{slug}', [ForumController::class, 'topic']);
    });
});
