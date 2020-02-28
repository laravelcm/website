<?php

namespace Modules\Forum\Filters;

use App\Filters\AbstractFilters;

class ThreadFilters extends AbstractFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'by' => ByFilter::class,
        'popular' => PopularFilter::class,
        'reply' => ReplyFilter::class,
        'answered' => AnsweredFilter::class
    ];
}
