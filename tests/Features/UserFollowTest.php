<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserFollowTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_can_follow_another_user()
    {
        $follower = factory(User::class)->create(['username' => 'johndoe']);

        $followed = factory(User::class)->create(['username' => 'janedoe']);

        $follower->followtoggle($followed);
    }
}
