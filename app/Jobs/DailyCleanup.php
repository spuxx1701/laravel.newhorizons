<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailVerification;
use App\Models\User;
use DateTime;

class DailyCleanup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get current datetime
        $datetime = new DateTime();
        // Find email verification records older than 2 days
        foreach (EmailVerification::all() as $emailVerification) {
            $createdAt = $emailVerification->created_at;
            $interval = date_diff($createdAt, $datetime);
            $deltaDays = $interval->format("%a");
            if ($deltaDays < 2) continue;
            // find and remove the user
            if ($user = User::find($emailVerification->user_id)) {
                $user->delete();
            }
            // make sure to remove any verification entries that are overdue
            $emailVerification->delete();
        }
    }
}
