<?php

namespace App\Repositories;


use App\Models\Media;
use Modules\Core\Repositories\BaseRepository;

class MediaRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Media::class;
    }
}
