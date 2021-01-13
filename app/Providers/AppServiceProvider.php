<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // add JSON:API headers to all responses
        Response::macro('jsonApi', function ($content, $statusCode) {
            return Response::json($content, $statusCode)
                ->header('Content-Type', 'application/vnd.api+json');
        });
    }
}
