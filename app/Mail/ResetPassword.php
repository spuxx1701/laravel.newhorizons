<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\PasswordReset;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $frontendUrl;
    public $passwordReset;
    public $passwordResetCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($passwordReset)
    {
        $this->passwordReset = $passwordReset;
        $this->passwordResetCode = $passwordReset->id;
        $this->frontendUrl = env("FRONTEND_URL");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset-password');
    }
}
