<?php

namespace App\Http\Controllers;

use App\Models\fav_games_table;
use App\Models\list_games;
use App\Models\user_preference;
use App\Models\wishlist_games;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class GamesController extends Controller
{
    
    public function index()
    {
        return view('index',[
            /* 'popularGames'=>$popularGames, */
        ]);
    }

    public function browse()
    {
        return view('browse');
    }   

    

    public function categoryGames($name){
        $games=Http::withHeaders(config('services.igdb'))
        ->send('POST', 'https://api.igdb.com/v4/games?', 
        [
            'body' => "fields name , cover.url , first_release_date , platforms.abbreviation , rating , aggregated_rating,slug;
            where genres.name=\"{$name}\";" 
        ]
        )->json();
        return view('category',[
            'categoryGames'=>$this->clean($games),
            'categoryname'=>$name,
        ]);

    }

    private function clean($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>Str::replaceFirst('thumb','cover_big', $game['cover']['url']),
                'rating'=>isset($game['rating'])?round($game['rating']).'%':null,
                'platforms'=>collect($game['platforms'])->pluck('abbreviation')->implode(', ')
            ]);
        })->toArray();
    }

    public function getGames(Request $request){
        $search =$request->name;

        return Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields id,name;
                search "'.$search.'" ;
                limit 8; '
            ]
            )->json();
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'game1'=>'required',
            'star'=>'required'
        ]);
        $data['game1']=json_encode($request->game1);
        user_preference::create([
        'user_id'=>'1',
        'game_id'=>$data['game1'],
        'rating'=>$data['star'],
    ]);
    
    return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game=Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => "fields similar_games.cover.url,similar_games.name,
                similar_games.rating , similar_games.platforms.abbreviation , similar_games.slug ;
                where slug=\"{$slug}\";" 
            ]
            )->json();
        //dump($game);

        abort_if(!$game,404); 

        return view('show',[
            'slug'=>$slug,
            'game'=>$this->cleanView($game[0]),
        ]);
    }
    private function cleanView($game){
        $temp=collect($game)->merge([
            'similarGames'=>collect($game['similar_games'])->map(function ($oneSimilarGame){
                return collect($oneSimilarGame)->merge([
                    'similarGamesCover'=>isset($oneSimilarGame['cover'])?
                    Str::replaceFirst('thumb','cover_big', $oneSimilarGame['cover']['url']):
                    'https://via.placeholder.com/264x352',
                    'similarGamesRating'=>isset($oneSimilarGame['rating'])?round($oneSimilarGame['rating']).'%':'0%',
                    'similarGamesPlatforms'=>isset($oneSimilarGame['platforms'])?
                    collect($oneSimilarGame['platforms'])->pluck('abbreviation')->implode(', '):null,
                ]);
            })->take(6),
            
        ]);
        //dd($temp);
        return $temp;
    }

    public function addGameToFavorites($id){
        fav_games_table::create([
            'user_id'=>Auth::user()->id,
            'game_id'=>$id,
        ]);
        //route( 'games.show',$game['slug'] )
        return redirect()->back()->with('sucMessage','Successfully Added To Favorites'); 

        //dump($id);
    }
    public function removeGamefromFavorites($id){
        fav_games_table::where('user_id', Auth::user()->id)
        ->where('game_id', $id)
        ->delete();
        //route( 'games.show',$game['slug'] )
        return redirect()->back()->with('sucMessage','Successfully Deleted From Favorites'); 

        //dump($id);
    }

    public function addGameToWishList($id){
        wishlist_games::create([
            'user_id'=>Auth::user()->id,
            'game_id'=>$id,
        ]);
        
        return redirect()->back()->with('sucMessage','Successfully Added To WishList'); 

        //dump($id);
    }
    public function removeGamefromWishList($id){
        wishlist_games::where('user_id', Auth::user()->id)
        ->where('game_id', $id)
        ->delete();
        
        return redirect()->back()->with('sucMessage','Successfully Deleted From WishList'); 

        //dump($id);
    }
    public function addGameToUserList($gameId,$listId){
        try{
        list_games::create([
            'list_id'=>$listId,
            'game_id'=>$gameId,
        ]);
        
        return redirect()->back()->with('sucMessage','Successfully Added to The List'); 
        }
    catch(Exception $e){
        return redirect()->back()->with('errorMessage','Game Already Added To This List');
        }
        
    }
    

}
