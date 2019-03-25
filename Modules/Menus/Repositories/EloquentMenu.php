<?php

namespace TypiCMS\Modules\Menus\Repositories;

use Exception;
use Illuminate\Support\Facades\Log;
use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Menus\Models\Menu;
use TypiCMS\Modules\Menus\Models\Menulink;
use TypiCMS\Modules\Projects\Facades\ProjectCategories;

class EloquentMenu extends EloquentRepository
{
    protected $repositoryId = 'menus';

    protected $model = Menu::class;

    /**
     * Get all models.
     *
     * @param array $with Eager load related models
     * @param bool  $all  Show published or all
     *
     * @return \Illuminate\Database\Eloquent\Collection|\TypiCMS\NestableCollection
     */
    public function all(array $with = [], $all = false)
    {
        $query = $this->with($with);

        if (!$all) {
            $query->published();
        }

        // Query ORDER BY
        $query->order();

        // Get
        return $query->get();
    }

    /**
     * Render a menu.
     *
     * @param string $name menu name
     *
     * @return string html code of a menu
     */
    public function render($name)
    {
        return view('menus::public._menu', ['name' => $name]);
    }

    public function renderHeader($name)
    {
        return view('menus::public._menuHeader', ['name' => $name]);
    }

    /**
     * Get a menu.
     *
     * @param string $name menu name
     *
     * @return \TypiCMS\Modules\Menus\Models\Menu|null
     */
    public function getMenu($name)
    {
        try {
            $menu = app('TypiCMS.menus')->first(function (Menu $menu) use ($name) {
                return $menu->name == $name;
            });
        } catch (Exception $e) {
            Log::info('No menu found with name “'.$name.'”');

            return null;
        }

        return $menu;
    }

    /**
     * Set href and classes for each items in collection.
     *
     * @param $items
     *
     * @return \TypiCMS\NestableCollection
     */
    public function prepare($items = null)
    {
        $items->each(function ($item) {
            $item->items = collect();
            if ($item->has_categories) {
                $item->items = $this->prepare(ProjectCategories::allForMenu($item->page->uri()));
            }
            $item->href = $this->setHref($item);
            $item->class = $this->setClass($item);
        });

        return $items;
    }

    /**
     * 1. If menulink has url field, take it.
     * 2. If menulink has a page, take the uri of the page in the current locale.
     *
     * @param $menulink
     *
     * @return string uri
     */
    public function setHref($menulink)
    {
        if ($menulink->url) {
            return $menulink->url;
        }
        if ($menulink->page) {
            return $menulink->page->uri();
        }

        return '/';
    }

    /**
     * Take the classes from field and add active if needed.
     *
     * @param $menulink
     *
     * @return string classes
     */
    public function setClass($menulink)
    {
        $classArray = preg_split('/ /', $menulink->class, null, PREG_SPLIT_NO_EMPTY);
        // add active class if current uri is equal to item uri or contains
        // item uri and is bigger than 3 to avoid homepage link always active ('/', '/lg')
        $pattern = $menulink->href;
        if (strlen($menulink->href) > 3) {
            $pattern .= '*';
        }
        if (request()->is($pattern)) {
            $classArray[] = 'active';
        }

        return implode(' ', $classArray);
    }
}
