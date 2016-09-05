<?php

namespace app\Notifications\Users;

use App\Models\Postcard;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostcardAdded extends Notification implements ShouldQueue
{
    use Queueable;

    public $postcard;

    /**
     * Create a new notification instance.
     *
     * @param Postcard $postcard
     */
    public function __construct(Postcard $postcard)
    {
        $this->postcard = $postcard;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->subject('Your postcard has been added!')
                    ->line('Thank you for sending us a postcard to represent '.$this->postcard->city.' in '.$this->postcard->country.'.')
                    ->action('See your postcard', 'https://phpmap.co/p/postcards')
                    ->line('Thank you for using PHPMap!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}
