<?php

namespace TypiCMS\Modules\Forums\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-forums')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Forums'), function (SidebarItem $item) {
                $item->id = 'forums';
                $item->icon = config('typicms.forums.sidebar.icon');
                $item->weight = config('typicms.forums.sidebar.weight');
                $item->route('admin::index-forums');
                $item->append('admin::create-forum');
            });
        });
    }
}
