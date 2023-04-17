<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class CommingSoon extends Component
{
    public $commingSoonGames=[]; 

    public function loadCommingSoon()
    {
       
        $current=Carbon::now()->timestamp;

        $commingSoonGamesCleaned  = Cache::remember('comming-soon', 120, function () use($current){
            return  Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields name , cover.url , first_release_date , slug;
                where category = (0,9) & platforms = (48,49)  
                & first_release_date > '.$current.';
                sort first_release_date desc;
                limit 4;'
            ]
            )->json();
        });
         //dump($mostAnticipatedGamesCleaned);
        //dump($this->cleanView($mostAnticipatedGamesCleaned));
         $this->commingSoonGames =$this->cleanView($commingSoonGamesCleaned);
    }

    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_small', $game['cover']['url']):null,
                'first_release_date'=>Carbon::parse ($game['first_release_date'])->format('M d,Y'),
            ]);
        })->toArray();
    }
    
    public function render()
    {
        return view('livewire.comming-soon');
    }
}
