<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Post;
use Modules\Core\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Post::class;
    }
}
