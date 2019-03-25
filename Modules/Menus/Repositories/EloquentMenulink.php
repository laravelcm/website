<?php

namespace TypiCMS\Modules\Menus\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Menus\Models\Menulink;

class EloquentMenulink extends EloquentRepository
{
    protected $repositoryId = 'menulinks';

    protected $model = Menulink::class;

    /**
     * Get sort data.
     *
     * @param int   $position
     * @param array $item
     *
     * @return array
     */
    protected function getSortData($position, $item)
    {
        return [
            'position' => $position,
            'parent_id' => $item['parent_id'],
        ];
    }
}
