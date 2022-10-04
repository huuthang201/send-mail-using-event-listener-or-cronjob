<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Notifications\NotifyInactiveUser;

class inactiveUsers extends Command
{

    protected $signature = 'email:inactiveUsers';

    protected $description = 'Send email to Inactive Users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $limit = Carbon::now()->subDay(7);
        $inactive_user = User::where('last_login', '<', $limit)->get();
        foreach ($inactive_user as $user) {
            $user->notify(new NotifyInactiveUser());
        }
    }
}
