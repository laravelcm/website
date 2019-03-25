<?php

namespace TypiCMS\Modules\Events\Repositories;

use Illuminate\Database\Eloquent\Collection;
use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Events\Models\Event;

class EloquentEvent extends EloquentRepository
{
    protected $repositoryId = 'events';

    protected $model = Event::class;

    /**
     * Get incomings events.
     *
     * @param int $number number of items to take
     *
     * @return Collection
     */
    public function upcoming($number = null)
    {
        return $this->published()->executeCallback(get_called_class(), __FUNCTION__, func_get_args(), function () use ($number) {
            $query = $this->prepareQuery($this->createModel())
                ->where('end_date', '>=', date('Y-m-d'))
                ->orderBy('start_date');
            if ($number) {
                $query->take($number);
            }

            return $query->get();
        });
    }
}
