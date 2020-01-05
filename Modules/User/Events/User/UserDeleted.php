<?php

namespace Modules\User\Events\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserDeleted.
 */
class UserDeleted
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
