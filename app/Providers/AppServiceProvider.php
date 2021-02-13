<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use CloudCreativity\LaravelJsonApi\LaravelJsonApi;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // include information about why validations failed into the responses
        //LaravelJsonApi::showValidatorFailures();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
