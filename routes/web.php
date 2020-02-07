<?php

use App\Http\Controllers\LanguageController;

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

Route::get('/')->name('frontend.index')->uses('HomeController');
Route::get('/welcome', function () {
    return view('welcome');
});
