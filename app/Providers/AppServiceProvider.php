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
        try {
            view()->composer(['index','layouts.my_app','layouts.profile','settings.index'],function ($view){
                $number = user_preference::where('user_id',Auth::user()->id)->count();
                $currentUser=User::where('id', Auth::user()->id)
                ->first();
               
                if ($currentUser->photo=="") {
                    $currentUser->photo='/imgs/avatar.png';
                }
                $view->with('currentUserPhoto',$currentUser->photo);
                //dd($currentUser->photo);
                
                if($number>=10&& $number%5==0){
                    $number+=1;
                    $view->with('total',10);
                    $gameCont = new ModelGameController();
                    $gameCont->recommendations();
                }
                else{
                    $view->with('total',$number);
                }
                
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        
    }
}
