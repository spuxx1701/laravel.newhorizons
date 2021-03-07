<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Jobs\SendConfirmEmail;
use App\Jobs\SendPasswordResetMail;
use App\Models\PasswordReset;

class ActionController extends Controller
{
    // Sends a verification email to the user if its email isn't verified yet.
    public function sendVerificationCode(Request $request)
    {
        $email = request("email");
        if ($email && $user = User::firstWhere("email", $email)) {
            if (!$user->email_verified_at) {
                SendConfirmEmail::dispatch($user);
            }
        }
    }

    // Sends a password reset code when requested.
    public function sendPasswordResetCode(Request $request)
    {
        $email = request("email");
        if ($email && $user = User::firstWhere("email", $email)) {
            // check if there already is a password reset record for this user
            if ($passwordReset = PasswordReset::firstWhere("user_id", $user->id)) {
                // don't create a new one and instead send another mail
                SendPasswordResetMail::dispatch($passwordReset);
            } else {
                // create the password reset record
                $passwordReset = new PasswordReset;
                $passwordReset->user_id = $user->id;
                $passwordReset->email = $email;
                if ($passwordReset->save()) {
                    // dispatch mail job
                    SendPasswordResetMail::dispatch($passwordReset);
                }
            }
        }
    }
}
