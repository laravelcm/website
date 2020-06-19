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

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;
use Modules\Dashboard\Http\Controllers\Backend\DashboardController;

Route::redirect('/', '/'.env('DASHBOARD_PREFIX').'/dashboard', 301);
Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('blank', [DashboardController::class, 'blank'])->name('blank');
});
Route::livewire('/backups', 'backup')->layout('layouts.master');

Route::get('/backup/download/{file_path?}', function () {
    $disk = Storage::disk(request()->input('disk'));
    $file_name = request()->input('path');
    $adapter = $disk->getDriver()->getAdapter();

    if ($adapter instanceof Local) {
        $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();

        if ($disk->exists($file_name)) {
            return response()->download($storage_path . $file_name);
        } else {
            abort(404, __('Le fichier de sauvegarde n\'existe pas.'));
        }
    } else {
        abort(404, __('Seuls les téléchargments à partir du système de fichier local sont supportés.'));
    }
})->name('backup.download');
