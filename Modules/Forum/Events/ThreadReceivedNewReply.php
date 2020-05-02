<?php

namespace Modules\Forum\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Forum\Entities\Reply;

class ThreadReceivedNewReply
{
    use SerializesModels;

    public Reply $reply;

    /**
     * Create a new event instance.
     *
     * @param $reply
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }
}
