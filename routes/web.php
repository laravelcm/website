<?php

use App\Http\Controllers\LanguageController;

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);
Route::get('/')->name('frontend.index')->uses('HomeController@index');
Route::get('/privacy')->name('privacy')->uses('HomeController@privacy');
Route::get('/terms')->name('terms')->uses('HomeController@terms');
