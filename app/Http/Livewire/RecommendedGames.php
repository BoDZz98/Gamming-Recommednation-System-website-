<?php

namespace App\Http\Livewire;

use App\Models\recommended_games;
use App\Models\user_preference;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;


class RecommendedGames extends Component
{
    public $recommendedGames=[];
    public $userGames=[];

    public function loadRecommendedGames()
    {
        if(Cache::has('rec-games') && Cache::has('user-games')){
            //Log::info("in here");
            //dd('in');
            $this->userGames=Cache::get('user-games');
            return $this->recommendedGames= Cache::get('rec-games');
        }
            
        $this->userGames=recommended_games::where('user_id', Auth::user()->id)->orderBy('rating', 'desc')->limit(12)->get();/* recommended_games */
        Cache::put('user-games', $this->userGames, now()->addMinutes(10));

        $unCleanedRecommendedGames=[];
        foreach($this->userGames as $game){
            //dd($game->game_id);
            $tempList =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields name , cover.url , platforms.abbreviation , rating , aggregated_rating,slug;
                    where id='.$game->game_id .';'
                ]
                )->json();
                //dd($tempList);
            array_push($unCleanedRecommendedGames,$tempList[0]);
        }    

        $this->recommendedGames =$this->cleanView($unCleanedRecommendedGames);
        Cache::put('rec-games', $this->recommendedGames, now()->addMinutes(10));
    }
    public function render()
    {
        return view('livewire.recommended-games');
    }

    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_big', $game['cover']['url']):null,
                'rating'=>isset($game['rating'])?round($game['rating']).'%':null,
                'platforms'=>isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):'No Platforms',
            ]);
        })->toArray();
    }


    /* fields name , cover.url , platforms.abbreviation , rating , aggregated_rating,slug;
                where category = (0,9) & platforms = (48)  & aggregated_rating>85 
                &  first_release_date < '.$after.';
                sort aggregated_rating desc;
                limit 1;' */
}
