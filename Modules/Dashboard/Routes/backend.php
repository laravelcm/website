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

use Modules\Dashboard\Http\Controllers\Backend\DashboardController;

Route::redirect('/', '/'.env('DASHBOARD_PREFIX').'/dashboard', 301);
Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('blank', [DashboardController::class, 'blank'])->name('blank');
});
