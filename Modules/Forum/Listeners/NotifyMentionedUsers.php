<?php

namespace Modules\Forum\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Forum\Events\ThreadReceivedNewReply;
use Modules\Forum\Notifications\YouWereMentioned;
use Modules\User\Repositories\Frontend\UserRepository;

class NotifyMentionedUsers
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Create the event listener.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  ThreadReceivedNewReply $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event)
    {
        $this->userRepository->whereIn('username', $event->reply->mentionedUsers())
            ->get()
            ->each(fn($user) => $user->notify(new YouWereMentioned($event->reply)));
    }
}
