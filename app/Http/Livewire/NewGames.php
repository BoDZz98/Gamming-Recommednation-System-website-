<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class NewGames extends Component
{
    public $newGames=[];
    
    public function loadNewGames()
    {
    
    $newGamesCleaned =Cache::remember('new-games',600,function(){
        return Http::withHeaders(config('services.igdb'))
    ->send('POST', 'https://api.igdb.com/v4/games?', 
    [
        'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,summary,slug;
        where platforms =(6,48,167,169) &first_release_date >1651735982 &hypes>20 &  total_rating_count>30 & cover.url!=null;
        sort total_rating desc;
        limit 3;'
    ]
    )->json();
    });
    //dump($this->cleanView($newGamesCleaned));
    $this->newGames=$this->cleanView($newGamesCleaned);
    }

    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_big', $game['cover']['url']):null,
                'rating'=>isset($game['rating'])?round($game['rating']).'%':null,
                'platforms'=>collect($game['platforms'])->pluck('abbreviation')->implode(', ')
            ]);
        })->toArray();
    }
    
    public function render()
    {
        return view('livewire.new-games');
    }
}
