<?php

namespace TypiCMS\Modules\Packages\Facades;

use Illuminate\Support\Facades\Facade;

class Packages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Packages';
    }
}
