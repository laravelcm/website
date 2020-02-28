<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class AnsweredFilter extends AbstractFilter
{
    public function mappings()
    {
        return [
            'yes' => 'yes',
            'no' => 'no',
        ];
    }

    /**
     * Filter the query according to resolved threads.
     *
     * @param  Builder $builder
     * @param  $value
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        switch ($value) {
            case null:
                return $builder;
            case 'yes':
                return $builder->whereNotNull('best_reply_id');
            case 'no':
                return $builder->whereNull('best_reply_id');
        }
    }
}
