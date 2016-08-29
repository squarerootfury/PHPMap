<?php

namespace App\Providers;

use App\Events\Users\UserSignedUp;
use App\Mail\Users\SocialSignupMail;
use App\Notifications\Users\SignedUp;
use App\Notifications\Users\SignedUpSocial;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

use App\Mail\Users\UserRegisteredMail;


use App\User;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            if (!$user->github_id === null) {
                $user->notify(new SignedUp($user));

                event(new UserSignedUp());
            }

            $user->notify(new SignedUpSocial($user));

            event(new UserSignedUp());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('bugsnag.logger', Log::class);
        $this->app->alias('bugsnag.logger', LoggerInterface::class);

        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
