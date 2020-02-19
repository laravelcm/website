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
use Modules\Forum\Http\Controllers\Frontend\ThreadController;

Route::prefix('forum')->group(function() {
    Route::get('/', [ThreadController::class, 'index']);
    Route::redirect('/channels', '/forum');
    Route::get('/channels/{slug}', [ForumController::class, 'channel']);
    Route::get('/{channel}/{thread}', [ThreadController::class, 'thread']);

    Route::middleware('auth')->group(function () {

    });
});
