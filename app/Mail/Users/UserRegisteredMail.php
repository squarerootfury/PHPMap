<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;


    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.welcome_email')
            ->subject('Welcome to PHPMap!')
            ->onQueue('emails');
    }
}
