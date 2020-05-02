<?php

namespace Modules\User\Entities\Traits;

use Illuminate\Database\Query\Builder;

trait UserScope
{
    /**
     * @param  Builder $query
     * @param  bool $confirmed
     *
     * @return mixed
     */
    public function scopeConfirmed(Builder $query, $confirmed = true)
    {
        return $query->where('confirmed', $confirmed);
    }

    /**
     * @param  Builder $query
     * @param  bool $status
     *
     * @return mixed
     */
    public function scopeActive(Builder $query, $status = true)
    {
        return $query->where('active', $status);
    }
}
