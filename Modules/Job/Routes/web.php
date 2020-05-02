<?php

use Modules\Job\Http\Controllers\Frontend\JobController;

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

Route::prefix('jobs')->as('jobs.')->group(function() {
    // Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/', [JobController::class, 'soon'])->name('soon');
});
