<?php

namespace Modules\Forum\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Forum\Entities\Reply;

class YouWereMentioned extends Notification
{
    use Queueable;

    /**
     * @var Reply
     */
    protected Reply $reply;

    /**
     * Create a new notification instance.
     *
     * @param Reply $reply
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Laravel Cameroun | Nouvelle mention")
            ->line($this->reply->owner->full_name. ' vous a mentionné dans le sujet '. $this->reply->thread->title)
            ->action('Afficher', url($this->reply->path()))
            ->line("Merci d'utiliser Laravel Cameroun!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'message' => '<span class="text-gray-800 font-medium">'.$this->reply->owner->full_name.'</span> vous a mentionné dans le sujet <span class="text-gray-800 font-medium">'. $this->reply->thread->title.'</span>',
            'link' => $this->reply->path(),
            'user_profile' => $this->reply->owner->username,
            'user_photo' => $this->reply->owner->picture,
            'action' => 'mention'
        ];
    }
}
