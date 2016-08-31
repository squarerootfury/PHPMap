<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            'access-profile' => 'Access your Profile Information',
            'access-articles' => 'Manage your Article Information',
            'access-meetups' => 'Manage your Meetup Information',
            'manage-profile' => 'Manage your Profile',
            'manage-articles' => 'Manage your Articles',
            'manage-meetups' => 'Manage your Meetups',
        ]);
    }
}
