<?php

namespace App\Console\Commands\user;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserRole;

class UpdateUserRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user/update-user-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Grants the role 'USR' to all users that don't have it yet.";

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
     * @return int
     */
    public function handle()
    {
        $amountUpdatedUSR = 0;
        $users = User::all();
        foreach ($users as $user) {
            if (!$user->userRoles->firstWhere("role", "USR")) {
                $userRole = new UserRole();
                $userRole->user_id = $user->id;
                $userRole->role = "USR";
                if ($userRole->save()) {
                    $amountUpdatedUSR++;
                }
            }
        }
        echo $amountUpdatedUSR . " users were given the role 'USR'.";
    }
}
