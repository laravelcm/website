<?php

namespace TypiCMS\Modules\Pages\Observers;

use TypiCMS\Modules\Menus\Models\Menulink;
use TypiCMS\Modules\Pages\Models\Page;

class AddToMenuObserver
{
    /**
     * If a new homepage is defined, cancel previous homepage.
     *
     * @param Model $model eloquent
     *
     * @return null
     */
    public function created(Page $model)
    {
        if ($menu_id = request('add_to_menu')) {
            $position = $this->getPositionFormMenu($menu_id);
            $data = [
                'menu_id' => $menu_id,
                'page_id' => $model->id,
                'position' => $position,
            ];
            foreach (locales() as $locale) {
                $data['title'][$locale] = $model->translate('title', $locale);
                $data['status'][$locale] = 0;
                $data['url'][$locale] = '';
            }
            Menulink::create($data);
        }
    }

    private function getPositionFormMenu($id)
    {
        $position = Menulink::where('menu_id', $id)->max('position');

        return $position + 1;
    }
}
