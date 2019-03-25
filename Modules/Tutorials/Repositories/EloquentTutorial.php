<?php

namespace TypiCMS\Modules\Tutorials\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Tutorials\Models\Tutorial;

class EloquentTutorial extends EloquentRepository
{
    protected $repositoryId = 'tutorials';

    protected $model = Tutorial::class;
}
