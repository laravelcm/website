<?php

namespace TypiCMS\Modules\Packages\Models;

use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Traits\HasFiles;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Packages\Presenters\ModulePresenter;
use TypiCMS\Modules\Users\Models\User;

class Package extends Base implements ViewableContract
{
    use HasFiles, HasTranslations, Historable, PresentableTrait, Viewable;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
    ];

    protected $appends = ['image', 'thumb'];

    /**
     * This model belongs to one user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Append image attribute.
     *
     * @return string
     */
    public function getImageAttribute()
    {
        return $this->images->first();
    }

    /**
     * Append thumb attribute.
     *
     * @return string
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }
}
