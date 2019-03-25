<?php

namespace TypiCMS\Modules\Packages\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-packages')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Packages'), function (SidebarItem $item) {
                $item->id = 'packages';
                $item->icon = config('typicms.packages.sidebar.icon');
                $item->weight = config('typicms.packages.sidebar.weight');
                $item->route('admin::index-packages');
                $item->append('admin::create-package');
            });
        });
    }
}
