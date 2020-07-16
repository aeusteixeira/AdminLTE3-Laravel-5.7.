<?php

namespace App\Providers;

use App\Register;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        view()->composer('*', function ($view)
        {
            $registers = Register::where('view', '0')->get();
            $view->with('registers', $registers);
        });

        Schema::defaultStringLength(191);
    }
}
