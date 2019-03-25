<?php

namespace TypiCMS\Modules\Packages\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Packages\Models\Package;

class EloquentPackage extends EloquentRepository
{
    protected $repositoryId = 'packages';

    protected $model = Package::class;
}
