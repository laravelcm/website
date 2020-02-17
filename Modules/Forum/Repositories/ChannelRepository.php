<?php

namespace Modules\Forum\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Forum\Entities\Channel;

class ChannelRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Channel::class;
    }
}
