<?php

namespace TypiCMS\Modules\Menus\Facades;

use Illuminate\Support\Facades\Facade;

class Menulinks extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Menulinks';
    }
}
