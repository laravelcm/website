<?php

namespace Modules\Tutorial\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Tutorial\Entities\Tutorial;

class TutorialRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Tutorial::class;
    }
}
