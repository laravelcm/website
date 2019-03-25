<?php

namespace TypiCMS\Modules\News\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-news')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('News'), function (SidebarItem $item) {
                $item->id = 'news';
                $item->icon = config('typicms.news.sidebar.icon', 'icon fa fa-fw fa-bullhorn');
                $item->weight = config('typicms.news.sidebar.weight');
                $item->route('admin::index-news');
                $item->append('admin::create-news');
            });
        });
    }
}
