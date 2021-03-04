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

// JSONApi
Route::group([
    "middleware" => "api-local"
], function ($router) {
    JsonApi::register('default')->withNamespace('App\Http\Controllers\Api')->singularControllers()->routes(function ($api) {
        $api->resource('bug-reports');
        $api->resource("users")->relationships(function ($relations) {
            $relations->hasMany("userRoles");
        })->only("create")->controller();
        $api->resource("email-verifications")->only("read")->controller()/*->routes(function ($emailVerifications) {
            $emailVerifications->get('{record}/request', 'request');
        })*/;
    });
});

// Authorization
Route::group([
    'middleware' => 'api-local',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

// Actions that don't require authentication
Route::group([
    "middleware" => "api-local",
    "prefix" => "actions"
], function ($router) {
    Route::get("send-verification-code", "App\Http\Controllers\ActionController@sendVerificationCode");
});

Route::fallback(function () {
    return response()->json(["message" => "Route not found."], 404);
})->name("api.fallback.404");
