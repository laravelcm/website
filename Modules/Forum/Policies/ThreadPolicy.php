<?php

namespace Modules\Forum\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Forum\Entities\Thread;
use Modules\User\Entities\User;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the thread.
     *
     * @param  User   $user
     * @param  Thread $thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
        return $thread->user_id === $user->id;
    }
}
