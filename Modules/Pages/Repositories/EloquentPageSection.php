<?php

namespace TypiCMS\Modules\Pages\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Pages\Models\PageSection;

class EloquentPageSection extends EloquentRepository
{
    protected $repositoryId = 'page_sections';

    protected $model = PageSection::class;
}
