<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\list_games;
use App\Models\user_lists_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ListController extends Controller
{
 
    public function index($id)
    {
        $list_details=user_lists_table::where('list_id', $id)->first();

        $list_games=list_games::where('list_id', $list_details->list_id)->get();

        $list_game_count=list_games::where('list_id', $list_details->list_id)->count();

        $unCleanedGamesInfo=[];
        $gamesInfo=[];

        foreach($list_games as $oneGame){
            
            $tempList =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields name , cover.url ,  platforms.abbreviation ,rating , aggregated_rating,slug;
                    where id='.$oneGame->game_id .';'
                ]
                )->json();
                //dd($tempList);
            array_push($unCleanedGamesInfo,$tempList[0]);
        }
        $gamesInfo =$this->cleanView($unCleanedGamesInfo);
        
        return view('profile.inside_list',[
            'list' =>$list_details,
            'gameNumber'=>$list_game_count,
            'listGame'=>$gamesInfo,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        $request->validate([
            'list_name'=>'required',
            'list_description'=>'required'
        ]);
        user_lists_table::create([
            'list_id'=>rand(),
            'user_id' => Auth::user()->id,
            'list_name' => $request->input('list_name'),
            'list_description' => $request->input('list_description'),
            'list_image_path' => '0',
        ]);
        return redirect()->route('profile.lists')->with('sucMessage','Successfully Added This List'); 

    } */

   
    public function cleanView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageUrl'=>isset($game['cover'])?Str::replaceFirst('thumb','cover_big', $game['cover']['url']):'https://via.placeholder.com/264x352',
                'rating'=>isset($game['rating'])?round($game['rating']).'%':null,
                'platforms'=>isset($game['platforms'])?collect($game['platforms'])->pluck('abbreviation')->implode(', '):'No Platforms',
            ]);
        })->toArray();
    }
}
