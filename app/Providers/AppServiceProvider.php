<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Services\Navigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

        app()->singleton('settings', function () {
            return Setting::with('translates')->first();
        });

        app()->singleton('categories', function () {
            return Category::with('translates')->get();
        });

        app()->singleton('nav', function () {
            return new Navigation();
        });

        View::composer(['app.*', 'auth.*'], function () {
            View::share('locales', collect(config('app.locales'))->filter(function ($l) {
                return $l !== app()->getLocale();
            }));
        });

        View::composer(['admin.commands.*', 'admin.directions.*'], function() {
           View::share('categories', Category::all());
        });
    }
}
