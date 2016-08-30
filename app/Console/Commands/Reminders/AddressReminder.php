<?php

namespace App\Console\Commands\Reminders;

use App\Notifications\Admin\AddressReminderReport;
use App\Notifications\Users\RemindAddress;
use App\User;
use Illuminate\Console\Command;

class AddressReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Looks for users who don´t provide an address';

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
        $users = User::where('address', '')->get();
        $admins = User::where('is_admin', 1)->get();

        if ($users) {
            foreach ($users as $user) {
                $user->notify(new RemindAddress());
            }

            foreach ($admins as $admin) {
                $admin->notify(new AddressReminderReport($users));
            }
        }

        $this->info('Reminder was send to "'. $users->count() . '" users');
    }
}
