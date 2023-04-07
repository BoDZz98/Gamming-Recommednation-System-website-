<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class MostAnticipated extends Component
{

    public $mostAnticipatedGames=[]; 

    public function loadMostAnticipated()
    {
       
        $after4=Carbon::now()->addMonth(4)->timestamp;
        $current=Carbon::now()->timestamp;
        

        $mostAnticipatedGamesCleaned  = Cache::remember('most-anticipated', 120, function () use($after4, $current){
            return  Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating;
                where category = (0,9) & platforms = (48,49)  
                &  first_release_date < '.$after4.' &  first_release_date > '.$current.';
                sort aggregated_rating desc;
                limit 4;'
            ]
            )->json();
        });
         //dump($mostAnticipatedGamesCleaned);
        //dump($this->cleanView($mostAnticipatedGamesCleaned));
         $this->mostAnticipatedGames =$this->cleanView($mostAnticipatedGamesCleaned);
    }

    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_small', $game['cover']['url']):null,
                'first_release_date'=>isset($game['first_release_date'])?Carbon::parse ($game['first_release_date'])->format('M d,Y'):null,
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
