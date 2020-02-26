<?php

namespace Modules\Forum\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Forum\Entities\Reply;
use Modules\User\Entities\User;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the authenticated user has permission to create a new reply.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        if (!$lastReply = $user->fresh()->lastReply) {
            return true;
        }

        return !$lastReply->wasJustPublished();
    }

    /**
     * Determine if the authenticated user has permission to update a reply.
     *
     * @param  User  $user
     * @param  Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $reply->user_id === $user->id;
    }
}
