<?php

namespace TypiCMS\Modules\Pages\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Traits\HasFiles;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Menus\Models\Menulink;
use TypiCMS\Modules\Pages\Presenters\ModulePresenter;
use TypiCMS\NestableTrait;

class Page extends Base
{
    use HasFiles;
    use HasTranslations;
    use Historable;
    use NestableTrait;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit', 'add_to_menu'];

    public $translatable = [
        'title',
        'slug',
        'uri',
        'status',
        'body',
        'meta_keywords',
        'meta_description',
    ];

    protected $appends = ['image', 'thumb'];

    /**
     * Get front office uri.
     *
     * @param string $locale
     *
     * @return string
     */
    public function uri($locale = null)
    {
        $locale = $locale ?: config('app.locale');
        $uri = $this->translate('uri', $locale);
        if (
            config('app.fallback_locale') != $locale ||
            config('typicms.main_locale_in_url')
        ) {
            $uri = $uri ? $locale.'/'.$uri : $locale;
        }

        return $uri ?: '/';
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
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }

    /**
     * A page has many sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany(PageSection::class)->order();
    }

    /**
     * Get all published sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedSections()
    {
        return $this->sections()->published();
    }

    /**
     * A page can have menulinks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menulinks()
    {
        return $this->hasMany(Menulink::class);
    }

    /**
     * A page can have subpages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subpages()
    {
        return $this->hasMany(self::class, 'parent_id')->order();
    }

    /**
     * A page can have a parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
