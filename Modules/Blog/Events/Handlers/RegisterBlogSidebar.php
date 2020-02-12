<?php

namespace Modules\Blog\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterBlogSidebar extends AbstractAdminSidebar
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
            $group->weight(70);
            $group->item("Blog", function (Item $item) {
                $item->weight(7);
                $item->icon('kt-menu__link-icon flaticon2-writing');
                $item->toggleIcon('kt-menu__ver-arrow la la-angle-right');
                $item->authorize(
                    $this->auth->user()->isAdmin()
                );

                $item->item("Categories", function (Item $item) {
                    $item->weight(0);
                    $item->icon('kt-menu__link-bullet kt-menu__link-bullet--dot');
                    $item->append();
                    $item->route('admin.categories.index');
                    $item->authorize(
                        $this->auth->user()->isAdmin()
                    );
                });

                $item->item("Articles", function (Item $item) {
                    $item->weight(2);
                    $item->icon('kt-menu__link-bullet kt-menu__link-bullet--dot');
                    $item->append();
                    $item->route('admin.categories.index');
                    $item->authorize(
                        $this->auth->user()->isAdmin()
                    );
                });
            });
        });

        return $menu;
    }
}
