<?php

use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\LanguageController;

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);
Route::get('/')->name('frontend.index')->uses('HomeController@index');

Route::post('/upload', [MediaController::class, 'upload'])->name('upload');
Route::delete('/remove-file/{id}', [MediaController::class, 'remove'])->name('remove');

Route::get('/join-slack')->uses('HomeController@slack')->name('slack');
Route::post('/join-slack')->uses('HomeController@joinSlack')->name('join-slack');
Route::get('/privacy')->uses('HomeController@privacy')->name('privacy');
Route::get('/terms')->uses('HomeController@terms')->name('terms');
