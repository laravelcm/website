<?php

namespace Modules\Dashboard\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterDashboardSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     *
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('menus.backend.sidebar.dashboard'), function (Group $group) {
            $group->weight(1);
            $group->authorize(
                $this->auth->user()->isAdmin()
            );
            $group->item(trans('menus.backend.sidebar.dashboard'), function (Item $item) {
                $item->weight(1);
                $item->icon('kt-menu__link-icon flaticon2-graphic');
                $item->route('admin.dashboard');
            });
        });

        return $menu;
    }
}
