<?php

namespace App\Console\Commands\Firebase;

use App\User;
use Illuminate\Console\Command;
use Firebase\FirebaseInterface;
use Firebase\FirebaseLib;

class ImportUsers extends Command
{

    const DEFAULT_PATH = '/users';


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'firebase:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports users to Firebase';

    /**
     * Create a new command instance.
     *
     * @param $firebaseClient
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
        $firebase = new \Firebase\FirebaseLib(env('FIREBASE_URL'), env('FIREBASE_SECRET'));
        $users = User::all();

        foreach ($users as $user) {
            $firebase->push('users', $user);
        }

        $this->info('"' . $users->count() . '" users were imported.');
    }
}
