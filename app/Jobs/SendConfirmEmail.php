<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;
use Exception;

class SendConfirmEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        if ($user->email_verified_at) {
            throw new Exception("User with email " . $user->email . " is already verified.");
        } else {
            Mail::to($user->email)->send(new ConfirmEmail($user));
        }
    }
}
