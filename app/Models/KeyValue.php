<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'key_values';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyvalue_id', 'keyvalue_type', 'key', 'value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function keyvalue()
    {
        return $this->morphTo();
    }
}
