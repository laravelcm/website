<?php

namespace Modules\User\Entities\Traits;

use App\Models\KeyValue;
use Modules\Forum\Entities\Activity;
use Modules\Forum\Entities\Reply;
use Modules\Forum\Entities\Thread;
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

    /**
     * Fetch all threads that were created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    /**
     * Fetch the last published reply for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    /**
     * Get all activity for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Get All User key Values elements.
     *
     * @return mixed
     */
    public function keyValues()
    {
        return $this->morphMany(KeyValue::class, 'keyvalue');
    }

    /**
     * Get a specific key for a user.
     *
     * @param  string $key
     * @return mixed
     */
    public function GetKeyValue($key)
    {
        return $this->morphMany(KeyValue::class, 'keyvalue')->where('key', '=', $key)->first();
    }
}
