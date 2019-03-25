<?php

namespace TypiCMS\Modules\Pages\Models;

use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Traits\HasFiles;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Pages\Presenters\ModulePresenter;
use TypiCMS\Modules\Pages\Traits\SortableSectionTrait;

class PageSection extends Base
{
    use HasFiles;
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableSectionTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'body',
    ];

    protected $appends = ['image', 'thumb'];

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
     * Get public uri.
     *
     * @return string
     */
    public function uri($locale = null)
    {
        $uri = $this->page->uri($locale).'#'.$this->position.'-'.$this->translate('slug', $locale);

        return $uri;
    }

    /**
     * Get edit url of model.
     *
     * @return string|void
     */
    public function editUrl()
    {
        $route = 'admin::edit-page_section';
        if (Route::has($route)) {
            return route($route, [$this->page_id, $this->id]);
        }

        return route('dashboard');
    }

    /**
     * Get back office’s index of models url.
     *
     * @return string|void
     */
    public function indexUrl()
    {
        $route = 'admin::edit-page';
        if (Route::has($route)) {
            return route($route, $this->page_id);
        }

        return route('dashboard');
    }

    /**
     * A section belongs to a page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
