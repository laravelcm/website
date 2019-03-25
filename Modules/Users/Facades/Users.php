<?php

namespace TypiCMS\Modules\Users\Facades;

use Illuminate\Support\Facades\Facade;

class Users extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Users';
    }
}
