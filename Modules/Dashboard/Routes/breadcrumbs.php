<?php

/*
|--------------------------------------------------------------------------
| Module Breadcrumb Create
|--------------------------------------------------------------------------
|
| Here is where you can register all breadcrumbs for your application.
| Now create something great! The file where breadcrumbs are loader. is
| in default routes folders 'routes/breadcrumbs/backend.php'. You may add
| this line to the backend.php file
|
| - require __DIR__. '/../../../Modules/{Module_NAME}/Routes/breadcrumbs.php'
|
*/

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('dashboard::string.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.blank', function ($trail) {
    $trail->push(__('dashboard::string.backend.dashboard.blank'), route('admin.blank'));
});
