<?php

namespace TypiCMS\Modules\Packages\Observers;

use TypiCMS\Modules\Packages\Models\Package;

class PackageObserver
{
    /**
     * Handle to the tutorial "creating" event.
     *
     * @param  Package  $package
     * @return void
     */
    public function creating(Package $package)
    {
        $package->user_id = auth()->user()->id;
    }
}
