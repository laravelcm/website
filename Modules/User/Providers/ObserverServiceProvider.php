<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Entities\User;
use Modules\User\Observers\UserObserver;

/**
 * Class ObserverServiceProvider.
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
