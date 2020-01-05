<?php

use App\Http\Controllers\LanguageController;

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

Route::get('/', 'HomeController@index')->name('frontend.index');
