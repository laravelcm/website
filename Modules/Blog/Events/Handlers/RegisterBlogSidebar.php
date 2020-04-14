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
        $menu->group('', function (Group $group) {
            $group->weight(1);
            $group->authorize(
                $this->auth->user()->isAdmin()
            );
            $group->item("Articles", function (Item $item) {
                $item->weight(2);
                $item->route('admin.posts.index');
                $item->badge(2);
                $item->icon('
                    <svg class="h-6 w-6 fill-current text-gray-500" viewBox="0 0 24 24">
                        <path d="M19.707 4.293a1 1 0 00-1.414 0L10 12.586V14h1.414l8.293-8.293a1 1 0 000-1.414zM16.88 2.879A3 3 0 1121.12 7.12l-8.585 8.586a1 1 0 01-.708.293H9a1 1 0 01-1-1v-2.828a1 1 0 01.293-.708l8.586-8.585zM6 6a1 1 0 00-1 1v11a1 1 0 001 1h11a1 1 0 001-1v-5a1 1 0 112 0v5a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h5a1 1 0 110 2H6z" />
                    </svg>
                ');
            });
        });

        return $menu;
    }
}
