<?php

namespace TypiCMS\Modules\Menus\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Menus\Presenters\ModulePresenter;

class Menu extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'status',
    ];

    public function menulinks()
    {
        return $this->hasMany(Menulink::class)->orderBy('position', 'asc');
    }
}
