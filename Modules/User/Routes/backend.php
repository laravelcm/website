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

use Modules\User\Http\Controllers\Backend\RoleController;
use Modules\User\Http\Controllers\Backend\UserAccessController;
use Modules\User\Http\Controllers\Backend\UserConfirmationController;
use Modules\User\Http\Controllers\Backend\UserController;
use Modules\User\Http\Controllers\Backend\UserPasswordController;
use Modules\User\Http\Controllers\Backend\UserSessionController;
use Modules\User\Http\Controllers\Backend\UserSocialController;
use Modules\User\Http\Controllers\Backend\UserStatusController;
use Modules\User\Http\Controllers\Backend\ProfileController;

Route::group([
    'prefix' => 'user',
    'as' => 'auth.',
    'middleware' => 'role:'.config('project.users.admin_role'),
], function() {
    // User Management

    // Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/{section?}', [ProfileController::class, 'index'])->name('index');
        Route::patch('password/update', [ProfileController::class, 'updatePassword'])
            ->middleware('password_expires')
            ->name('password.update');
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'users'], function () {
        // User CRUD
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // User Status
        Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
        Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');
        Route::get('/{user}/mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);
        Route::get('/{user}/delete', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
        Route::get('/{user}/restore', [UserStatusController::class, 'restore'])->name('user.restore');

        // Access
        Route::get('/{user}/login-as', [UserAccessController::class, 'loginAs'])->name('user.login-as');

        // Password
        Route::get('/{user}/password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
        Route::patch('/{user}/password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');

        // Social
        Route::delete('/{user}/social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');

        // Account
        Route::get('/{user}/account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');
        // Confirmation
        Route::get('/{user}/confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
        Route::get('/{user}/unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');

        // Session
        Route::get('/{user}/clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');
    });

    // Role Management
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::post('/', [RoleController::class, 'store'])->name('role.store');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::delete('delete', [RoleController::class, 'deleteAll'])->name('role.delete');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
        Route::patch('/{role}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    });
});
