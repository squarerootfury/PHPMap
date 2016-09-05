<?php

namespace App\Listeners\Users;

use App\Events\Users\UserSignedUp;

class UserSignedUpListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param UserSignedUp $event
     */
    public function handle(UserSignedUp $event)
    {
    }
}
