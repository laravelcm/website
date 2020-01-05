<?php

namespace Modules\User\Entities\Traits;

use Modules\User\Entities\PasswordHistory;
use Modules\User\Entities\SocialAccount;

trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }
}
