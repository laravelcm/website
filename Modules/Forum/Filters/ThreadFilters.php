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
        'answered' => AnsweredFilter::class,
        'by' => ByFilter::class,
        'filter_by' => ParticipateFilter::class,
        'popular' => PopularFilter::class,
        'reply' => ReplyFilter::class,
        'search' => SearchFilter::class,
    ];
}
