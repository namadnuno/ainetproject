<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('isActive', function ($routeName) {
            return "<?= request()->route()->getName() == $routeName ? 'class=\"is-active\"' : '' ?>";
        });

        Blade::directive('isActiveClass', function ($routeName) {
            return "<?= request()->route()->getName() == $routeName ? 'is-active' : '' ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
