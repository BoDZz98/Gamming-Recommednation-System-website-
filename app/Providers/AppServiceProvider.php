<?php

namespace App\Providers;

use App\Models\user_preference;
use Illuminate\Support\Facades\Auth;
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
        
        view()->composer('layouts.my_app',function ($view){
            $number = user_preference::where('user_id',Auth::user()->id)->count();
            $view->with('total',$number);
        });
    }
}
