<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use PHPMap\User;

class UserTest extends TestCase
{
	use DatabaseMigrations;

    public function test_find_users_by_their_username()
    {
        $createdUser = factory(User::class)->create([
            'username' => 'johndoe'
        ]);

        $foundUser = User::findByUsername('johndoe');

        $this->assertEquals($createdUser->id, $foundUser->id);
        $this->assertEquals('johndoe', $foundUser->username);
    }

    public function test_find_users_by_their_email()
    {
        $createdUser = factory(User::class)->create([
            'username' => 'johndoe',
            'email' => 'john@example.com'
        ]);

        $foundUser = User::findByemail('john@example.com');

        $this->assertEquals($createdUser->id, $foundUser->id);
        $this->assertEquals('john@example.com', $foundUser->email);
    }
}
