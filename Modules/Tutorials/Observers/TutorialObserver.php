<?php

namespace TypiCMS\Modules\Tutorials\Observers;

use TypiCMS\Modules\Tutorials\Models\Tutorial;

class TutorialObserver
{
    /**
     * Handle to the tutorial "creating" event.
     *
     * @param  Tutorial  $tutorial
     * @return void
     */
    public function creating(Tutorial $tutorial)
    {
        $tutorial->user_id = auth()->user()->id;
    }
}
