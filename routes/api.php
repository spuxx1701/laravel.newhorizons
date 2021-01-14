<?php

use App\Http\Controllers\BugReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Neomerx\JsonApi;

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

/*JsonApi::register('default')->routes(function ($api) {
    $api->resource('bug-reports');
});*/
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::get("/bug-report", [BugReportController::class, "index"]);
//Route::get("/bug-report/{id}", [BugReportController::class, "show"]);
/*Route::get('/bug-report', 'BugReportController@index')->name(("bug-reports"));
Route::get('/bug-report/{id}', 'BugReportController@show');
Route::post('/bug-report', 'BugReportController@store');
Route::put('/bug-report/{id}', 'BugReportController@update');
Route::delete('/bug-report/{id}', 'BugReportController@destroy');*/

Route::fallback(function () {
    return response()->json(["message" => "Route not found."], 404);
})->name("api.fallback.404");
