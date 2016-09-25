<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class WallPostTest extends TestCase
{
	use DatabaseMigrations;
    
    public function test_user_can_create_wall_posts()
    {
    	$user = factory(User::class)->create();

    	$user->posts()->create([
    		'body' => 'Lorem Ipsum Dolor Sit Amet'
    	]);

        $this->assertTrue(true);
    }
}
