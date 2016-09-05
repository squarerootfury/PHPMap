<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddressReminderReport extends Notification implements ShouldQueue
{
    use Queueable;

    public $users;

    /**
     * Create a new notification instance.
     */
    public function __construct($users)
    {
        $this->users = $users;
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
        return ['mail', 'database'];
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
                    ->subject('Address-Reminder sent!')
                    ->line('The latest "Address-Reminder" was sent to '.$this->users->count().' users')
                    ->action('Show Backend', 'https://phpmap.co/backend')
                    ->line('Thank you for using PHPMap');
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
