<?php

namespace App\Models;

class Category extends \TCG\Voyager\Models\Category
{
    protected $fillable = ['slug', 'name', 'type'];

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }
}
