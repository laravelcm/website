<?php

namespace Modules\Core\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterCoreSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     *
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('menus.backend.sidebar.cms'), function (Group $group) {
            $group->weight(50);
            $group->authorize(
                $this->auth->user()->isAdmin()
            );
        });

        return $menu;
    }
}
