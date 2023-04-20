<?php

namespace App\Providers;

use App\Http\Controllers\ModelGameController;
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
            $allmodels = user_preference::where('user_id',Auth::user()->id)->get();
            if($number>=10&& $number%5==0){
                $number+=1;
                $view->with('total',10);
                $gameCont = new ModelGameController();
                $gameCont->recommendations();
            }
            else{
                $view->with('total',$number);
            }
            //dd($allmodels);
            //$view->with('total',$allmodels[1]->game_id);
        });
    }
}
