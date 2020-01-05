<?php

namespace Modules\User\Events\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserPermanentlyDeleted.
 */
class UserPermanentlyDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
