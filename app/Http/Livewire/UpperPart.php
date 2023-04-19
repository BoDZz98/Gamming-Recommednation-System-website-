<?php

namespace App\Http\Livewire;

use App\Models\fav_games_table;
use App\Models\user_lists_table;
use App\Models\user_preference;
use App\Models\wishlist_games;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;


class UpperPart extends Component
{
    public $detailsPart=[]; 
    public $userLists=[];
    public $slug;
    public $isFav=false;
    public $isWishList=false;
    public $userRating=0;
   
    
    public function loadDetailsPart()
    {
        $gameSlug=$this->slug;
        //dd($gameSlug);
        $detailsPartCleaned  = Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => "fields name , genres.name , rating , summary , first_release_date,aggregated_rating,
                involved_companies.company.name, platforms.abbreviation , slug , websites.* ,
                cover.url , videos.video_id;
                where slug=\"{$gameSlug}\";" 
            ]
            )->json();
        //dd($detailsPartCleaned );

        $this->userLists=user_lists_table::where('user_id', Auth::user()->id)
        ->get();
        //dump($this->userLists);
         
        //to check if the game is added to fav/wishlist or not
        $temp=fav_games_table::where('user_id', Auth::user()->id)
             ->where('game_id', $detailsPartCleaned[0]['id'])
             ->first();
        $temp==null?$this->isFav=false:$this->isFav=true;

        $temp2=wishlist_games::where('user_id', Auth::user()->id)
             ->where('game_id', $detailsPartCleaned[0]['id'])
             ->first();
        $temp2==null?$this->isWishList=false:$this->isWishList=true;
        
        $this->userRating=user_preference::where('user_id', Auth::user()->id)
        ->where('game_id', $detailsPartCleaned[0]['id'])
        ->first();/* recommended_games */


        $this->detailsPart =$this->cleanView($detailsPartCleaned);
        //dump($this->detailsPart['coverImageUrl']);
        //{{$detailsPart['coverImageUrl']}}
    }

    public function render()
    {
        return view('livewire.upper-part');
    }

    private function cleanView($games){
        return collect($games)->map(function ($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_big', $game['cover']['url']):null,
                'rating'=>isset($game['rating'])?round($game['rating']).'%':'0%',
                'aggregated_rating'=>isset($game['aggregated_rating'])?round($game['aggregated_rating']).'%':'0%',
                'genres'=>isset($game['genres'])?collect($game['genres'])->pluck('name')->implode(', '):'No Genres',
                'platforms'=>isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):'No Platforms',
                'first_release_date'=>isset($game['first_release_date'])?Carbon::parse ($game['first_release_date'])->format('M d,Y'):"No Release Date",
                'trailer' => isset($game['videos'])?'https://youtube.com/embed/'.$game['videos'][0]['video_id']:null,
                'social'=>[
                    'website'=>isset($game['websites'])?collect($game['websites'])->first():null,
                    'facebook'=>isset($game['websites'])?collect($game['websites'])->filter(function ($website){
                        return str::contains($website['url'],'facebook');
                    })->first():null,
                    'twitter'=>isset($game['websites'])?collect($game['websites'])->filter(function ($website){
                        return str::contains($website['url'],'twitter');
                    })->first():null,
                    'instagram'=>isset($game['websites'])?collect($game['websites'])->filter(function ($website){
                        return str::contains($website['url'],'instagram');
                    })->first():null,
                ]
    
                ]);
        })->toArray();
        
        //dd($temp);
        
    }
}
