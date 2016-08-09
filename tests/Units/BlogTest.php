<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use PHPMap\User;
use PHPMap\Models\BlogEntry;

class BlogTest extends TestCase
{
	use DatabaseMigrations;

    public function test_user_can_create_blog_entries()
    {
        $user = factory(User::class)->create(['username' => 'johndoe']);

        $blogEntry = factory(BlogEntry::class)->make([
        	'title' => 'Test Entry',
            'slug' => 'test_entry',
        	'body' => 'Lorem Ipsum Dolor Sit Amet..'
        ]);

        $user->blog_entries()->save($blogEntry);

        $this->visit('/blogs/johndoe/articles/test_entry')
             ->see('Test Entry');
    }

    public function test_find_entry_by_slug()
    {
        $user = factory(User::class)->create(['username' => 'johndoe']);

        $blogEntry = factory(BlogEntry::class)->make([
            'title' => 'Test Entry',
            'slug' => 'test_entry',
            'body' => 'Lorem Ipsum Dolor Sit Amet..'
        ]);

        $user->blog_entries()->save($blogEntry);

        $foundEntry = BlogEntry::findBySlug('test_entry');
    }
}
