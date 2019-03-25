<?php

namespace TypiCMS\Modules\Menus\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-menus')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Menus'), function (SidebarItem $item) {
                $item->id = 'menus';
                $item->icon = config('typicms.menus.sidebar.icon', 'icon fa fa-fw fa-bars');
                $item->weight = config('typicms.menus.sidebar.weight');
                $item->route('admin::index-menus');
                $item->append('admin::create-menu');
            });
        });
    }
}
