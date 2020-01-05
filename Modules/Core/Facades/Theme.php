<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Core\Contracts\ThemeContract;

class Theme extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ThemeContract::class;
    }
}
