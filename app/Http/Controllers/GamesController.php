<?php

namespace App\Http\Controllers;

use App\Models\user_preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           // dump($latestReleasesGames);
        return view('index',[
            /* 'popularGames'=>$popularGames, */
        ]);
    }

    public function browse()
    {
        return view('browse',[
            /* 'genresInfo'=>$genres */
        ]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'body' => "fields screenshots.url , videos.video_id , similar_games.cover.url,similar_games.name,
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
