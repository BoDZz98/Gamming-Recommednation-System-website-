<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\user_preference;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;


class UserGames extends Component
{
    public $game1;
    public $rating1;

    public $currentPage=1;
    public $pages=[
        1=>'Step 1/5',
        2=>'Step 2/5',
        3=>'Step 3/5',
        4=>'Step 4/5',
        5=>'Step 5/5',
    ];

    public function goToNextPage(){
        
        Log::info('clicked');

        $this->currentPage++;
    }

    public function goToPreviousPage(){
        $this->currentPage--;
    }

    public function submit(){
        
        user_preference::create([
            'user_id'=>'1',
            'game_id'=>$this->game1,
            'rating'=>$this->rating1,
        ]);
        

    }

    public function render()
    {
        
        Log::info('This is some useful information.');


        return view('livewire.user-games');
    }

    public $popularGames=[]; 
    
    public function loadPopularGames()
    {
        $after=Carbon::now()->addMonth(2)->timestamp;

        $popularGamesCleaned  = 
             Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,slug;
                where category = (0,9) & platforms = (48)  & rating>95 
                &  first_release_date < '.$after.';
                sort rating desc;
                limit 10;'
            ]
            )->json();
        
         
        //dump($this->cleanView($popularGamesCleaned));
        $this->popularGames =$this->cleanView($popularGamesCleaned);
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
