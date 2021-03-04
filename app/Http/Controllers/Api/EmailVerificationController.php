<?php

namespace App\Http\Controllers\Api;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchResource;
use App\Models\User;
use App\Models\UserRole;
use App\Models\EmailVerification;
use DateTime;

class EmailVerificationController extends JsonApiController
{
    protected function didRead($result, $request)
    {
        // try to find the user by email
        $user = User::where("email", $result->email)->first();
        if ($user) {
            // set email_verified_at to current datetime
            $datetime = new DateTime();
            $user->email_verified_at = $datetime->format('Y-m-d H:i:s');
            if ($user->save()) {
                // assign the default 'USR' role
                $userRole = new UserRole();
                $userRole->user_id = $user->id;
                $userRole->role = "USR";
                $userRole->save();
                // remove the emailVerification entry
                $result->delete();
            }
        }
    }
}
