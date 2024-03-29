<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames=[]; 
    
    public function loadPopularGames()
    {
        $after=Carbon::now()->addMonth(2)->timestamp;

        if(Cache::has('pop-games')){       
            return $this->popularGames= Cache::get('pop-games');
        }
        
        $popularGamesCleaned  = Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,slug;
                where category = (0,9) & platforms =( 48,167) & total_rating>90 & total_rating_count>100 &  cover.url!=null;
                sort total_rating desc;
                limit 9;'
            ]
            )->json();
        
        
        //dump($this->cleanView($popularGamesCleaned));
        //Cache::put('myFunctionResult2', $this->cleanView($popularGamesCleaned), now()->addDay());
        $this->popularGames =$this->cleanView($popularGamesCleaned);
        Cache::put('pop-games',$this->popularGames, now()->addMinutes(1));
        
        
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>Str::replaceFirst('thumb','cover_big', $game['cover']['url']),
                'rating'=>isset($game['rating'])?round($game['rating']).'%':null,
                'platforms'=>collect($game['platforms'])->pluck('abbreviation')->implode(', ')
            ]);
        })->toArray();
    }
}
