<?php

namespace TypiCMS\Modules\Pages\Traits;

trait SortableSectionTrait
{
    public static function bootSortableSectionTrait()
    {
        static::creating(function ($model) {
            $model->position = $model->getHighestOrderNumber() + 1;
        });
    }

    /**
     * Determine the order value for the new record.
     */
    public function getHighestOrderNumber(): int
    {
        return (int) $this->where('page_id', $this->page_id)->max('position');
    }
}
