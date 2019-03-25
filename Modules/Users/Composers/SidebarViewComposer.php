<?php

namespace TypiCMS\Modules\Users\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-users')) {
            return;
        }
        $view->sidebar->group(__('Users and roles'), function (SidebarGroup $group) {
            $group->id = 'users';
            $group->weight = 50;
            $group->addItem(__('Users'), function (SidebarItem $item) {
                $item->id = 'users';
                $item->icon = config('typicms.users.sidebar.icon', 'icon fa fa-fw fa-user');
                $item->weight = config('typicms.users.sidebar.weight');
                $item->route('admin::index-users');
                $item->append('admin::create-user');
            });
        });
    }
}
