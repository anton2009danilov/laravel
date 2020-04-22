<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
//        \Validator::extend('jedi', function($attributes, $values, $params, $validator) {
//            dd($attributes, $values, $params, $validator);
//            return false;
//        });
//        \View::share('menu', 'menu<br>');
    }
}
