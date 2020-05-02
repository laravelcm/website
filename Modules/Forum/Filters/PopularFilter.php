<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class PopularFilter extends AbstractFilter
{
    public function mappings()
    {
        return [
          'week' => 'week',
          'all' => 'all'
        ];
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        switch ($value) {
            case null:
                return $builder;
            case 'all':
                return $builder->orderBy('replies_count', 'desc');
            case 'week':
                $startWeek = Carbon::now()->startOfWeek();
                $endWeek = Carbon::now()->endOfWeek();

                return $builder
                    ->whereBetween('created_at', [$startWeek, $endWeek])
                    ->orderBy('replies_count', 'desc');
        }
    }
}
