<?php

namespace App\Providers;

use App\Models\Setting;
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
        View::composer(['app.*', 'auth.*'], function () {
            View::share('locales', collect(config('app.locales'))->filter(function ($l) {
                return $l !== app()->getLocale();
            }));
        });
    }
}
