<?php

namespace App\Observers;

use App\Models\Package;

class PackageObserver
{
    /**
     * Handle to the package "creating" event.
     *
     * @param Package $package
     * @return void
     */
    public function creating(Package $package)
    {
        $package->user_id = auth()->user()->id;
    }

    /**
     * Handle to the package "created" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function created(Package $package)
    {
        //
    }

    /**
     * Handle the package "updated" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function updated(Package $package)
    {
        //
    }

    /**
     * Handle the package "deleted" event.
     *
     * @param  \App\Models\Package  $package
     * @return void
     */
    public function deleted(Package $package)
    {
        //
    }
}
