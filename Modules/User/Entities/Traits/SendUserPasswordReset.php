<?php

namespace Modules\User\Entities\Traits;

use Modules\User\Notifications\UserNeedsPasswordReset;

trait SendUserPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param  string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}
