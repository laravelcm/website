<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Entities\User;

class ParticipateFilter extends AbstractFilter
{
    public function mappings()
    {
        return [
          'contributed_to' => "contributed_to"
        ];
    }

    /**
     * Filter by username to the database.
     *
     * @param  Builder $builder
     * @param  $value
     * @return Builder
     */
    public function filter(Builder $builder, $value)
    {
        $user = User::where('username', $value)->first();

        if ($user === null) {
            return $builder;
        }

        return $builder->where('user_id', $user->id);
    }
}
