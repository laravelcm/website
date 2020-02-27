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
use Modules\Forum\Http\Controllers\Frontend\ReplyController;

Route::prefix('forum')->group(function() {
    Route::get('/', [ThreadController::class, 'index'])->name('forum');
    Route::redirect('/channels', '/forum');
    Route::get('/channels/{slug}', [ForumController::class, 'channel'])->name('channel');
    Route::get('/{channel}/{thread}', [ThreadController::class, 'thread'])->name('threads');

    Route::middleware('auth')->group(function () {
        Route::post('/thread/{thread}/replies', [ReplyController::class, 'store'])->name('reply.store');
        Route::post('/threads', [ThreadController::class, 'store'])->name('thread.store');
    });
});
