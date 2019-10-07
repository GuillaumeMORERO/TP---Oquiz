<?php

namespace App\Providers;

use App\Utils\UserSession;
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
        view()->share('isUserConnected', UserSession::isConnected());
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
