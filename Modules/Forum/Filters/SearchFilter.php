<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends AbstractFilter
{
    /**
     * Filter by search query to the database.
     *
     * @param  Builder $builder
     * @param  string $value
     * @return Builder
     */
    public function filter(Builder $builder, $value)
    {
        return $builder
            ->where('title', 'like', '%'.$value.'%')
            ->orWhere('body', 'like', '%'.$value.'%');
    }
}
