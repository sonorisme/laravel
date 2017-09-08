<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//this is also added
use Illuminate\Support\Facades\Schema;
use Request;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Added this line because of migration error
        Schema::defaultStringLength(191);

        if (Request::url() != '/'){
            $navPath = array(url('/').'#portfolio', url('/').'#about', url('/').'#contact');
            View::share('navPath', $navPath);
        }
        
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
