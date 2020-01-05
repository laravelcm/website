<?php

namespace Modules\Setting\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterSettingSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     *
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('menus.backend.sidebar.system'), function (Group $group) {
            $group->weight(23);
            $group->authorize(
                $this->auth->user()->isAdmin()
            );
            $group->item(trans('setting::menus.backend.title'), function (Item $item) {
                $item->weight(23);
                $item->icon('kt-menu__link-icon flaticon-settings');
                $item->route('admin.setting.index');
            });
        });

        return $menu;
    }
}
