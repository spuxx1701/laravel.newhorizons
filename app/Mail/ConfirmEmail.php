<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailVerification;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $frontendUrl;
    public $user;
    public $verificationCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->verificationCode = EmailVerification::firstWhere("user_id", $user->id)->id;
        $this->frontendUrl = env("FRONTEND_URL");
    }

    /**
     * Build the message.
     * 
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirm-email');
    }
}
