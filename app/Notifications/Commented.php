<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Commented extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/post/show/' . $this->comment->post_id);
        return (new MailMessage)
            ->subject('Commented')
            ->markdown('mail.comment.commented', ['url' => $url , 'post'=> $this->comment->post->title , 'user'=>$this->comment->user->name]);
//            ->line('The Post named "' . $this->comment->post->title . '" a user has commented.')
//            ->line('Comment is "' . $this->comment->description . '" done by ' . $this->comment->user->name)
//            ->action('See your post', $url)
//            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
