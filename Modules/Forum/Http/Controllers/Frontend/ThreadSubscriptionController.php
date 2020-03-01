<?php

namespace Modules\Forum\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Forum\Entities\Thread;

class ThreadSubscriptionController extends Controller
{
    /**
     * Store a new thread subscription.
     *
     * @param  string $channel
     * @param  Thread $thread
     */
    public function store($channel, Thread $thread)
    {
        $thread->subscribe();
    }

    /**
     * Delete an existing thread subscription.
     *
     * @param  string $channel
     * @param  Thread $thread
     */
    public function destroy($channel, Thread $thread)
    {
        $thread->unsubscribe();
    }
}
