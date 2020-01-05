<?php

namespace Modules\User\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterUserSidebar extends AbstractAdminSidebar
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
            $group->weight(22);
            $group->item(trans('user::menus.backend.access.title'), function (Item $item) {
                $item->weight(1);
                $item->icon('kt-menu__link-icon flaticon2-lock');
                $item->toggleIcon('kt-menu__ver-arrow la la-angle-right');
                $item->authorize(
                    $this->auth->user()->isAdmin()
                );

                $item->item(trans('user::labels.backend.access.users.management'), function (Item $item) {
                    $item->weight(0);
                    $item->icon('kt-menu__link-bullet kt-menu__link-bullet--dot');
                    $item->append();
                    $item->route('admin.auth.user.index');
                    $item->authorize(
                        $this->auth->user()->isAdmin()
                    );
                });

                $item->item(trans('user::labels.backend.access.roles.management'), function (Item $item) {
                    $item->weight(1);
                    $item->icon('kt-menu__link-bullet kt-menu__link-bullet--dot');
                    $item->append();
                    $item->route('admin.auth.role.index');
                    $item->authorize(
                        $this->auth->user()->isAdmin()
                    );
                });
            });
        });

        return $menu;
    }
}
