<?php

namespace App\Observers;

use App\Models\Tutorial;

class TutorialObserver
{
    /**
     * Handle to the tutorial "creating" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function creating(Tutorial $tutorial)
    {
        $tutorial->user_id = auth()->user()->id;
    }

    /**
     * Handle to the tutorial "created" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function created(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the tutorial "updated" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function updated(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the tutorial "deleted" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function deleted(Tutorial $tutorial)
    {
        //
    }
}
