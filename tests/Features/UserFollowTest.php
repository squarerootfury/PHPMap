<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserFollowTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_can_follow_other_users()
    {
        $this->assertTrue(true);
    }
}
