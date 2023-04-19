<?php

namespace App\Providers;

use App\Http\Controllers\ModelGameController;
use App\Models\User;
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
        
            //view()->share('bodzation', 100);
        
        view()->composer('*',function ($view){
            $number = user_preference::where('user_id',Auth::user()->id)->count();
            $currentUser=User::where('id', Auth::user()->id)
            ->first();
            
            //dd($currentUser->photo);
            
            if($number>=10){
                $view->with('total',10);
                $view->with('currentUserPhoto',$currentUser->photo);

                
                $gameCont = new ModelGameController();
               # $gameCont->recommendations();
                 
            }
            else{
                $view->with('total',$number);
                $view->with('currentUserPhoto',$currentUser->photo);
            }
            //dd($allmodels);
            //$view->with('total',$allmodels[1]->game_id);
            if($number>=10&& $number%5==0){
                $number+=1;
                
            }
        });
    }
}
