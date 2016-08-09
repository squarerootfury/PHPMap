<?php

namespace PHPMap\Listeners\Users;

use PHPMap\Events\Users\NewFollower;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMap\Notifications\Users\UserFollowed;

class NewFollowerListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewFollower  $event
     * @return void
     */
    public function handle(NewFollower $event)
    {
        auth()->user()->notify(new UserFollowed($event->user));
    }
}
