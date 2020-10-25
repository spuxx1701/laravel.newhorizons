<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bug-reports', 'BugReportController@index');
Route::get('bug-reports/{id}', 'BugReportController@show');
Route::post('bug-reports', 'BugReportController@store');
Route::put('bug-reports/{id}', 'BugReportController@update');
Route::delete('bug-reports/{id}', 'BugReportController@destroy');
