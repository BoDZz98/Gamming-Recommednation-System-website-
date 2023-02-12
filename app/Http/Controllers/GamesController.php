<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        //
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
                'body' => "fields name , genres.name , rating , summary , first_release_date,aggregated_rating,
                involved_companies.company.name, platforms.abbreviation , slug , websites.* ,
                cover.url , screenshots.url , videos.video_id , similar_games.cover.url,similar_games.name,
                similar_games.rating , similar_games.platforms.abbreviation , similar_games.slug ;
                where slug=\"{$slug}\";" 
            ]
            )->json();
        //dump($game);

        abort_if(!$game,404); 

        return view('show',[
            'game'=>$this->cleanView($game[0]),
        ]);
    }
    private function cleanView($game){
        $temp=collect($game)->merge([
            'coverImageUrl'=>Str::replaceFirst('thumb','cover_big', $game['cover']['url']),
            'rating'=>isset($game['rating'])?round($game['rating']).'%':'0%',
            'aggregated_rating'=>isset($game['aggregated_rating'])?round($game['aggregated_rating']).'%':'0%',
            'genres'=>collect($game['genres'])->pluck('name')->implode(', '),
            'platforms'=>isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):null,
            'first_release_date'=>Carbon::parse ($game['first_release_date'])->format('M d,Y'),
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
            'social'=>[
                'website'=>collect($game['websites'])->first(),
                'facebook'=>collect($game['websites'])->filter(function ($website){
                    return str::contains($website['url'],'facebook');
                })->first(),
                'twitter'=>collect($game['websites'])->filter(function ($website){
                    return str::contains($website['url'],'twitter');
                })->first(),
                'instagram'=>collect($game['websites'])->filter(function ($website){
                    return str::contains($website['url'],'instagram');
                })->first(),
            ]

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
