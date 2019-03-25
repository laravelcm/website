<?php

namespace TypiCMS\Modules\Tutorials\Facades;

use Illuminate\Support\Facades\Facade;

class Tutorials extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Tutorials';
    }
}
