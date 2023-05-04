<?php

namespace App\Http\Livewire;

use App\Models\user_preference;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;


class UserGames extends Component
{
    public $game1;
    public $game2;
    public $game3;
    public $game4;
    public $game5;
    public $rating1;
    public $rating2;
    public $rating3;
    public $rating4;
    public $rating5;
   
    

    public $currentPage=1;
    public $pages=[
        1=>'Step 1/5',
        2=>'Step 2/5',
        3=>'Step 3/5',
        4=>'Step 4/5',
        5=>'Step 5/5',
    ];

    private $validationRules=[
        1=>[
            'game1'=>['required'],
            'rating1'=>['required']
        ],
        2=>[
            'game2'=>['required'],
            'rating2'=>['required']
        ],
        3=>[
            'game3'=>['required'],
            'rating3'=>['required']
        ],
        4=>[
            'game4'=>['required'],
            'rating4'=>['required']
        ],
        5=>[
            'game5'=>['required'],
            'rating5'=>['required']
        ]
    ];

    public function goToNextPage(){ 
       /*  Log::info($this->game1.$this->game2); */
       $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage(){
        $this->currentPage--;
    }

    public function submit(){
        
        
        $rules=collect($this->validationRules)->collapse()->toArray(); //Make it an array without the keys[1,2,3,4,5]
        $this->validate($rules);        
        $arrGames=[$this->game1,$this->game2,$this->game3,$this->game4,$this->game5];
        $arrRating=[$this->rating1,$this->rating2,$this->rating3,$this->rating4,$this->rating5];
        for ($i=0; $i < 5; $i++) { 
            try{
                user_preference::create([
                    'user_id'=>Auth::user()->id,
                    'game_id'=>$arrGames[$i],
                    'rating'=>$arrRating[$i],
                ]);
            }catch (Exception $e) {
                //Log::info('in catch'.$i);
                continue;
                
            }
        };
        return redirect()->route('games.index' )->with('sucMessage',' Rating Was Successfully Added'); 

    }

    public function render()
    {  
        // Log::info('This is some useful information.');
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
                'body' => 'fields name , cover.url ;
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
                
            ]);
        })->toArray();
    }
}
