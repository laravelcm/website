<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\Traits\RecordsActivity;
use Modules\Forum\Events\ThreadReceivedNewReply;
use Modules\Forum\Filters\ThreadFilters;
use Modules\User\Entities\User;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Thread extends Model implements Searchable
{
    use RecordsActivity;

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['creator', 'channel'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'isSubscribedTo',
        'path',
        'resume',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_posted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'locked' => 'boolean'
    ];

    public $searchableType = 'Forum';

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });

        static::created(function ($thread) {
            $thread->update(['slug' => $thread->title]);
        });
    }

    /**
     * Donne la bonne date en fonction de la timezone.
     *
     * @param  $value
     * @return \JamesMills\LaravelTimezone\Carbon
     */
    public function getCreatedAtAttribute($value)
    {
        return \Timezone::convertFromLocal($value);
    }

    /**
     * A thread belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A thread is assigned a channel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * A thread may have many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * A thread may have a last reply.
     *
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne|object|null
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->orderByDesc('created_at');
    }

    /**
     * Add a reply to the thread.
     *
     * @param  array $reply
     * @return Model
     */
    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);

        event(new ThreadReceivedNewReply($reply));

        return $reply;
    }

    /**
     * Subscribe a user to the current thread.
     *
     * @param int|null $userId
     * @return Thread
     */
    public function subscribe($userId = null)
    {
        $this->subscriptions()->create([
            'user_id' => $userId ?: auth()->id()
        ]);

        return $this;
    }

    /**
     * Unsubscribe a user from the current thread.
     *
     * @param int|null $userId
     */
    public function unsubscribe($userId = null)
    {
        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }

    /**
     * A thread can have many subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(ThreadSubscription::class);
    }

    /**
     * Determine if the current user is subscribed to the thread.
     *
     * @return boolean
     */
    public function getIsSubscribedToAttribute()
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
    }

    /**
     * Determine if the thread has been updated since the user last read it.
     *
     * @param  User $user
     * @return bool
     * @throws \Exception
     */
    public function hasUpdatesFor($user)
    {
        $key = $user->visitedThreadCacheKey($this);

        return $this->updated_at > cache($key);
    }

    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::where('slug', $slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function getPathAttribute()
    {
        return "/forum/{$this->channel->slug}/{$this->slug}";
    }

    /**
     * Get a short resume of the body
     *
     * @return string
     */
    public function getResumeAttribute()
    {
        return str_limit(strip_tags($this->body), 200);
    }

    /**
     * Mark the given reply as the best answer.
     *
     * @param Reply $reply
     */
    public function markBestReply(Reply $reply)
    {
        $this->update(['best_reply_id' => $reply->id]);
    }

    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder $builder
     * @param  $request
     * @param  array $filters
     * @return Builder
     */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new ThreadFilters($request))->add($filters)->filter($builder);
    }

    /**
     * Return search result for post.
     *
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('threads', ['channel' => $this->channel->slug, 'thread' => $this->slug]);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
