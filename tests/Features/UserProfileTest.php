<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserProfileTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_has_profile()
    {
        $user = factory(User::class)->create();

        $this->visit('/@'.$user->username)
            ->see($user->username)
            ->see($user->city)
            ->see($user->country)
            ->see($user->address);
    }
}
