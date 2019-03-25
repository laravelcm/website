<?php

namespace TypiCMS\Modules\Menus\Models;

use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Pages\Models\Page;
use TypiCMS\NestableTrait;

class Menulink extends Base
{
    use HasTranslations;
    use Historable;
    use NestableTrait;
    use PresentableTrait;

    protected $presenter = 'TypiCMS\Modules\Menus\Presenters\MenulinkPresenter';

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'title',
        'url',
        'status',
    ];

    /**
     * A menulink belongs to a menu.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * A menulink can belongs to a page.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * A menulink can have submenulinks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submenulinks()
    {
        return $this->hasMany(self::class, 'parent_id')->order();
    }

    /**
     * A menulink can have a parent.
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get edit url of model.
     *
     * @return string|void
     */
    public function editUrl()
    {
        $route = 'admin::edit-menulink';
        if (Route::has($route)) {
            return route($route, [$this->menu_id, $this->id]);
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
        $route = 'admin::edit-menu';
        if (Route::has($route)) {
            return route($route, $this->menu_id);
        }

        return route('dashboard');
    }
}
