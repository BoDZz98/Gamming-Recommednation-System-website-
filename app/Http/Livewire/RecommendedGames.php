<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class RecommendedGames extends Component
{
    public $recommendedGames=[];

    public function loadRecommendedGames()
    {
        $after=Carbon::now()->addMonth(2)->timestamp;

        $recommendedGamesCleaned  = Cache::remember('recommended-games', 60, function () use($after){
            return Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,slug;
                where category = (0,9) & platforms = (48)  & aggregated_rating>85 
                &  first_release_date < '.$after.';
                sort aggregated_rating desc;
                limit 8;'
            ]
            )->json();
        });
         
        //dump($this->cleanView($popularGamesCleaned));
        $this->recommendedGames =$this->cleanView($recommendedGamesCleaned);
    }
    public function render()
    {
        return view('livewire.recommended-games');
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
