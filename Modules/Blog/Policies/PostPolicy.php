<?php

namespace Modules\Blog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Modules\Blog\Entities\Post;
use Modules\User\Entities\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the post.
     *
     * @param  User   $user
     * @param  Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->proposed_by
            ? Response::allow()
            : Response::deny("Vous ne pouvez pas modifier cet article");
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  User   $user
     * @param  Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $user->id === $post->proposed_by
            ? Response::allow()
            : Response::deny("Vous ne pouvez pas voir cet article, car il appartient a un autre utilisateur");
    }
}
