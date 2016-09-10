<?php

namespace App\Console\Commands\Mails;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\Users\JobAnnouncment;

class SendJobAnnouncement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:jobannouncment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Job-Announcment to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new JobAnnouncement($user));
        }
    }
}
