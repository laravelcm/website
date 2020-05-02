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

use Modules\User\Http\Controllers\Frontend\AccountController;
use Modules\User\Http\Controllers\Frontend\Auth\ConfirmAccountController;
use Modules\User\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use Modules\User\Http\Controllers\Frontend\Auth\LoginController;
use Modules\User\Http\Controllers\Frontend\Auth\PasswordExpiredController;
use Modules\User\Http\Controllers\Frontend\Auth\RegisterController;
use Modules\User\Http\Controllers\Frontend\Auth\ResetPasswordController;
use Modules\User\Http\Controllers\Frontend\Auth\SocialLoginController;
use Modules\User\Http\Controllers\Frontend\Auth\UpdatePasswordController;
use Modules\User\Http\Controllers\Frontend\DashboardController;
use Modules\User\Http\Controllers\Frontend\ProfileController;
use Modules\User\Http\Controllers\Frontend\UserNotificationController;

/**
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */
Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
    // These routes require the user to be logged in
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        //For when admin logged in as user from backend
        Route::get('logout-as', [LoginController::class, 'logoutAs'])->name('logout-as');

        // These routes cannot be hit if the password has expired
        // Change Password Routes
        Route::patch('password/update', [UpdatePasswordController::class, 'update'])
            ->middleware('password_expires')
            ->name('password.update');

        // Password expired routes
        Route::get('password/expired', [PasswordExpiredController::class, 'expired'])->name('password.expired');
        Route::patch('password/expired', [PasswordExpiredController::class, 'update'])->name('password.expired.update');
    });

    // These routes require no user to be logged in
    Route::group(['middleware' => 'guest'], function () {
        // Register & Authentication Routes
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.post');

        // Socialite Routes
        Route::get('login/{provider}', [SocialLoginController::class, 'login'])->name('social.login');
        Route::get('login/{provider}/callback', [SocialLoginController::class, 'login']);

        // Register Routes
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.post');

        // Confirm Account Routes
        Route::get('account/confirm/{token}', [ConfirmAccountController::class, 'confirm'])->name('account.confirm');
        Route::get('account/confirm/resend/{uuid}', [ConfirmAccountController::class, 'sendConfirmationEmail'])->name('account.confirm.resend');

        // Password Reset Routes
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.email');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email.post');

        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
    });
});

/**
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'password_expires', 'as' => 'user.'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::delete('account/deactivate', [AccountController::class, 'deactivate'])->name('deactivate');
        Route::get('notifications', [UserNotificationController::class, 'index'])->name('notifications');
        Route::delete('notifications/{id}', [UserNotificationController::class, 'destroy'])->name('notifications.markAsRead');
        Route::get('badges', [AccountController::class, 'badges'])->name('badges');
        Route::get('publishing', [AccountController::class, 'publishing'])->name('publishing');
        Route::put('profile/profile', [ProfileController::class, 'profile'])->name('profile.profile');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    });
});

// Profile Routes
Route::get('u/@{username}', [ProfileController::class, 'index'])->name('user.profile');
