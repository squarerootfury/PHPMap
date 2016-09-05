<?php

namespace app\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Users\NewFollower' => [
            'App\Listeners\Users\NewFollowerListener',
        ],

        'App\Events\Users\UserSignedUp' => [
            'App\Listeners\Users\UserSignedUpListener',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
