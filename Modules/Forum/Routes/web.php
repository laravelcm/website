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
use Modules\Forum\Http\Controllers\Frontend\ThreadSubscriptionController;

Route::prefix('forum')->group(function() {
    Route::get('/', [ThreadController::class, 'index'])->name('forum');
    Route::redirect('/channels', '/forum');
    Route::get('/channels/{slug}', [ForumController::class, 'channel'])->name('channel');
    Route::get('/{channel}/{thread}', [ThreadController::class, 'thread'])->name('threads');

    Route::middleware(['auth'])->group(function () {
        Route::delete('/{channel}/{thread}', [ThreadController::class, 'destroy'])->name('threads.destroy');
        Route::delete('/{channel}/{thread}/subscriptions', [ThreadSubscriptionController::class, 'destroy'])->name('threads.unsubscribe');
        Route::post('/{channel}/{thread}/subscriptions', [ThreadSubscriptionController::class, 'store'])->name('threads.subscribe');
        Route::get('/{channel}/{thread}/users', [ThreadController::class, 'users'])->name('threads.users');

        Route::prefix('threads')->group(function () {
            Route::post('/', [ThreadController::class, 'store'])->name('threads.store');
            Route::put('/{id}', [ThreadController::class, 'update'])->name('threads.update');
            Route::post('/{thread}/replies', [ReplyController::class, 'store'])->name('replies.store');
            Route::put('/reply/{id}', [ReplyController::class, 'update'])->name('replies.update');
            Route::post('/replies/{reply}/best', [ReplyController::class, 'best'])->name('replies.best');
        });

        Route::delete('/replies/remove/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');
    });
});
