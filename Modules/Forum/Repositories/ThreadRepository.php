<?php

namespace Modules\Forum\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Forum\Entities\Thread;

class ThreadRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Thread::class;
    }
}
