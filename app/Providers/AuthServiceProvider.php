<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\Forum\Entities\Reply;
use Modules\Forum\Entities\Thread;
use Modules\Forum\Policies\ReplyPolicy;
use Modules\Forum\Policies\ThreadPolicy;
use Modules\Forum\Policies\UserPolicy;
use Modules\User\Entities\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Reply::class => ReplyPolicy::class,
        Thread::class => ThreadPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->isAdmin()) return true;
        });
    }
}
