<?php

namespace TypiCMS\Modules\Tutorials\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-tutorials')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Tutorials'), function (SidebarItem $item) {
                $item->id = 'tutorials';
                $item->icon = config('typicms.tutorials.sidebar.icon');
                $item->weight = config('typicms.tutorials.sidebar.weight');
                $item->route('admin::index-tutorials');
                $item->append('admin::create-tutorial');
            });
        });
    }
}
