<?php

namespace App\Http\Controllers\Api;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchResource;
use App\Models\User;
use App\Models\PasswordReset;
use DateTime;

class PasswordResetController extends JsonApiController
{
    protected function updated($record, $request)
    {
        // get the matching user and update their password
        $user = User::find($record->user_id);
        $user->password = $record->new_password;
        if ($user->save()) {
            // if the update succeeds, remove the passwordReset record
            $record->delete();
        }
    }
}
