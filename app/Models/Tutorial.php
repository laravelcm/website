<?php

namespace App\Models;

use App\User;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use Viewable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'resume', 'is_published', 'image', 'user_id', 'category_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
