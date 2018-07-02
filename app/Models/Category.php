<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Viewable;

class Category extends \TCG\Voyager\Models\Category
{
    use Viewable;

    /**
     * @var array
     */
    protected $fillable = ['slug', 'name', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
