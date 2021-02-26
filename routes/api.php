<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "api-private"], function ($router) {
    JsonApi::register('default')->withNamespace('App\Http\Controllers\Api')->singularControllers()->routes(function ($api) {
        $api->resource('bug-reports');
        $api->resource("users")->relationships(function ($relations) {
            $relations->hasMany("userRoles");
        })->only("create")->controller();
        $api->resource("email-verifications")->only("read")->controller();
    });
});

Route::group([
    'middleware' => 'api-private',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

// Route::post('auth/login', 'App\Http\Controllers\AuthController@login');
// Route::post('auth/logout', 'App\Http\Controllers\AuthController@logout');
// Route::post('auth/refresh', 'App\Http\Controllers\AuthController@refresh');
// Route::post('auth/me', 'App\Http\Controllers\AuthController@me');


// // get csrf token
// Route::get('/csrf-cookie', function (Request $request) {
//     $token = $request->session()->token();
//     $token = csrf_token();
// });

// // route for authorization using sanctum
// Route::post('sanctum/auth', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required'
//     ]);
//     $user = User::where('email', $request->email)->first();
//     if (!$user || !Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             "error" =>  ["invalid_grant"],
//         ]);
//     }
//     return $user->createToken($request->email)->plainTextToken;
// });

Route::fallback(function () {
    return response()->json(["message" => "Route not found."], 404);
})->name("api.fallback.404");
