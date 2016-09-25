<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class MeetupListTest extends TestCase
{
    public function test_check_for_meetups_on_phpug()
    {
    	$client = new Client();
		$meetups = $client->request('GET', 'https://php.ug/api/rest/listtype/1')->getBody()->__toString();

		if (! $meetups) {
			$this->assertTrue(false);
		}

		$this->assertTrue(true);
    }
}
