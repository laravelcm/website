<?php

namespace TypiCMS\Modules\News\Models;

use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Traits\HasFiles;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\News\Presenters\ModulePresenter;

class News extends Base implements ViewableContract
{
    use HasFiles, HasTranslations, Historable, PresentableTrait, Viewable;

    protected $presenter = ModulePresenter::class;

    protected $dates = ['date'];

    protected $guarded = ['id', 'exit'];

    protected $appends = ['image', 'thumb'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
    ];

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
