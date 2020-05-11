<?php

use Modules\Blog\Http\Controllers\Frontend\ProposeController;

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

Route::prefix('publishing')->as('publishing.')->group(function () {
    Route::get('/propose', [ProposeController::class, 'propose'])->name('propose');
    Route::get('/propose/{id}', [ProposeController::class, 'edit'])->name('edit');
    Route::post('/propose', [ProposeController::class, 'store'])->name('store');
    Route::put('/propose/{id}', [ProposeController::class, 'update'])->name('update');
    Route::delete('/propose/{id}', [ProposeController::class, 'destroy'])->name('destroy');
});
