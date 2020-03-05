<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\Traits\RecordsActivity;
use Modules\User\Entities\User;

class Post extends Model
{
    use RecordsActivity;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'featured' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
      'published_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propose()
    {
        return $this->belongsTo(User::class, 'proposed_id');
    }
}
