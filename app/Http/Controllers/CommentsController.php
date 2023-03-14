<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $game=Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => "fields cover.url , name;
                where id={$id};" 
            ]
            )->json();
        //dump($game);

        abort_if(!$game,404); 
        return view('comments_page',[
            'game'=>$this->cleanView($game[0])
        ]);
    }

    private function cleanView($game){
        return collect($game)->merge([
            'coverImageUrl'=>Str::replaceFirst('thumb','cover_big', $game['cover']['url']),
        ]);
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
        Log::warning("in store");
        /* $request->validate([
            'rating1'=>'required',
        ]); */
        comments::create([
            'user_id'=>Auth::user()->id,
            'game_id'=>$request->input('gameId'),
            'comment_description'=>$request->input('desc'),
            'stars'=>$request->input('rating1'),
        ]);
        /* 'games.index' */
        return redirect()->route('comments.index',$request->input('gameId') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
