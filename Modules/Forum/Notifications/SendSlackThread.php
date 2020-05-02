<?php

namespace Modules\Forum\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Modules\Forum\Entities\Thread;

class SendSlackThread extends Notification
{
    use Queueable;

    /**
     * @var Thread
     */
    public Thread $thread;

    /**
     * Create a new notification instance.
     *
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @return SlackMessage
     */
    public function toSlack()
    {
        $url = url($this->thread->path);

        return (new SlackMessage)
            ->to('#forum')
            ->content('[Nouveau sujet] '.$this->thread->creator->full_name. ' a crée un nouveau sujet : '. $this->thread->title. '. '. $url);
    }
}
