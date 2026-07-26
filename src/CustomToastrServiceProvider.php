<?php

namespace Najmul\CustomToastr;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CustomToastrServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('toastr', function ($app) {
            return new Toastr();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'custom-toastr');

        Blade::component('custom-toastr::components.toastr', 'custom-toastr');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/custom-toastr'),
            ], 'custom-toastr-views');
        }
    }
}
