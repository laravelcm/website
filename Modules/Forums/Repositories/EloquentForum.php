<?php

namespace TypiCMS\Modules\Forums\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Forums\Models\Forum;

class EloquentForum extends EloquentRepository
{
    protected $repositoryId = 'chatter_categories';

    protected $model = Forum::class;
}
