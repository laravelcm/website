<?php

namespace TypiCMS\Modules\Forums\Models;

use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Forums\Presenters\ModulePresenter;

class Forum extends Base
{
    use Historable;
    use PresentableTrait;

    protected $table = 'chatter_categories';

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [];
}
