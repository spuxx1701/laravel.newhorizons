<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\SendConfirmEmail;

class SendVerificationCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user/send-verification-code {email : The users email.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attempts to resend the verification code to the given email.';

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
        $email = $this->argument("email");
        if ($user = User::firstWhere("email", $email)) {
            SendConfirmEmail::dispatch($user);
        } else {
            throw new \Exception("No user with email " . $email . ".");;
        }
    }
}
