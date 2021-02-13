<?php

namespace App\Http\Controllers\Api;

use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use App\Jobs\SendConfirmEmail;
use App\Models\EmailVerification;

class UserController extends JsonApiController
{
    protected function created($record, $request)
    {
        // create entry in email verification code
        $emailVerification = new EmailVerification;
        $emailVerification->user_id = $record->id;
        $emailVerification->email = $record->email;
        if ($emailVerification->save()) {
            // dispatch mail job
            SendConfirmEmail::dispatch($record);
        }
    }
}
