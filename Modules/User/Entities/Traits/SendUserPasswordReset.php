<?php

namespace Modules\User\Entities\Traits;

use Modules\User\Notifications\UserNeedsPasswordReset;

/**
 * Class SendUserPasswordReset.
 */
trait SendUserPasswordReset
{
    /**
     * Send the password reset notification.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserNeedsPasswordReset($token));
    }
}
