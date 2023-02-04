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
    
    $newGamesCleaned =Cache::remember('new-games',120,function(){
        return Http::withHeaders(config('services.igdb'))
    ->send('POST', 'https://api.igdb.com/v4/games?', 
    [
        'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,summary;
        where category = (0,8,9) & platforms = (48,49) &  first_release_date < 1609689433 &  cover.url!=null;
        sort first_release_date desc;
        limit 3;'
    ]
    )->json();
    });
    
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
