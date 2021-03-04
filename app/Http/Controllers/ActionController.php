<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Jobs\SendConfirmEmail;

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
}
