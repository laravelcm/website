<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ReplyFilter extends AbstractFilter
{
    public function mappings()
    {
        return [
          'no' => 0
        ];
    }

    /**
     * Filter the query according to those that are no reply yet.
     *
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }

        return $builder->where('replies_count', $value);
    }
}
