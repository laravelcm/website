<?php

/*
|--------------------------------------------------------------------------
| Module Breadcrumb Create
|--------------------------------------------------------------------------
|
*/

Breadcrumbs::for('admin.auth.user.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('user::labels.backend.access.users.management'), route('admin.auth.user.index'));
});

Breadcrumbs::for('admin.auth.user.deactivated', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.deactivated'), route('admin.auth.user.deactivated'));
});

Breadcrumbs::for('admin.auth.user.deleted', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.deleted'), route('admin.auth.user.deleted'));
});

Breadcrumbs::for('admin.auth.user.create', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::labels.backend.access.users.create'), route('admin.auth.user.create'));
});

Breadcrumbs::for('admin.auth.user.show', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.view'), route('admin.auth.user.show', $id));
});

Breadcrumbs::for('admin.auth.user.edit', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});

Breadcrumbs::for('admin.auth.user.change-password', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});

Breadcrumbs::for('admin.auth.profile.index', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('user::menus.backend.access.users.profile'), route('admin.auth.profile.index'));
});

// Role Breadcrumb

Breadcrumbs::for('admin.auth.role.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('user::menus.backend.access.roles.management'), route('admin.auth.role.index'));
});

Breadcrumbs::for('admin.auth.role.create', function ($trail) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('user::menus.backend.access.roles.create'), route('admin.auth.role.create'));
});

Breadcrumbs::for('admin.auth.role.edit', function ($trail, $id) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('user::menus.backend.access.roles.edit'), route('admin.auth.role.edit', $id));
});
