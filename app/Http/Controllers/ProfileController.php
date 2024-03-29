<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\comments;
use App\Models\fav_games_table;
use App\Models\list_games;
use App\Models\User;
use App\Models\user_lists_table;
use App\Models\wishlist_games;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class ProfileController extends Controller
{

    public function index(){
        //testing
        /* user_lists_table::create([
            'list_id'=>300,
            'user_id' => 1,
            'list_name' => 'list 1',
            'list_description' => 'this is list one',
            'list_image_path' => '0',
            
        ]); */
        $user_comments=comments::where('user_id', Auth::user()->id)
        ->latest()
        ->limit(2)
        ->get();
        
        $unCleanedGamesInfo=[];
        $gamesInfo=[];
        $emojis=['Hated it','Dislike it','it\'s ok','liked it','loved it'];


        foreach($user_comments as $oneComment){
            //dd($game->game_id);
            $tempList1 =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields name , cover.url , rating , aggregated_rating,slug;
                    where id='.$oneComment->game_id .';'
                ]
                )->json();
                //dd($tempList);
            array_push($unCleanedGamesInfo,$tempList1[0]);
        }
        $gamesInfo =$this->cleanView($unCleanedGamesInfo);
        //dd($gamesInfo);
        //____________________________________________________________________________
        $user_fav_num=fav_games_table::where('user_id', Auth::user()->id)->count();
        $user_fav=fav_games_table::where('user_id', Auth::user()->id)
        ->latest()
        ->first();
        $gamesInfo2=[];
        if ($user_fav!=null) {
            $tempList2 =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields  cover.url ;
                    where id='.$user_fav->game_id .';'
                ]
                )->json();
            $gamesInfo2 =$this->cleanView($tempList2);
        }else{
            $gamesInfo2=[1];
        }
            
        
        //____________________________________________________________________________
        $wish_games_num=wishlist_games::where('user_id', Auth::user()->id)->count();
        $user_wish=wishlist_games::where('user_id', Auth::user()->id)
        ->latest()
        ->first();
        $gamesInfo3=[];
        if ($user_wish!=null) {
            $tempList3 =  Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => 'fields  cover.url ;
                where id='.$user_wish->game_id .';'
            ]
            )->json();
            $gamesInfo3 =$this->cleanView($tempList3);
        }else{
            $gamesInfo3=[1];
        }
            
        //____________________________________________________________________________
        $list_num=user_lists_table::where('user_id', Auth::user()->id)->count();
        $list_info=user_lists_table::where('user_id', Auth::user()->id)->latest()
        ->first();


        return view('profile.overview',[
        'games' =>$gamesInfo,
        'games_fav'=>$gamesInfo2[0],
        'games_wish'=>$gamesInfo3[0],
        'userComments'=> $user_comments,
        'emojis'=>$emojis,
        'fav_games_num'=>$user_fav_num,
        'wish_games_num'=>$wish_games_num,
        'list_num'=>$list_num,
        'list_photo'=>isset($list_info->list_image_path)?$list_info->list_image_path:1,
    ]);
    }

    public function favorites(){
        $user_fav=fav_games_table::where('user_id', Auth::user()->id)->get();
        $unCleanedGamesInfo=[];
        $gamesInfo=[];

        foreach($user_fav as $oneGame){
            
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
        return view('profile.favorites',[
            'fav_games' =>$gamesInfo,
        ]);
    }


    public function wishlist()
    {
        $user_wishlist=wishlist_games::where('user_id', Auth::user()->id)->get();
        $unCleanedGamesInfo=[];
        $gamesInfo=[];

        foreach($user_wishlist as $oneGame){
            //dd($game->game_id);
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
        //dd($gamesInfo);
        return view('profile.wishlist',[
            'wishlist_games' =>$gamesInfo,
        ]);
    }

    public function wishlist_games_pagecover(){
        $user_fav=wishlist_games::where('user_id', Auth::user()->id)->get();
        $unCleanedGamesInfo=[];
        $gamesInfo=[];

        foreach($user_fav as $oneGame){
            
            $tempList =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields name , cover.url ,  platforms.abbreviation ,rating , aggregated_rating,slug;
                    where id='.$oneGame->game_id .';'
                ]
                )->json();
                //dd($tempList);
            array_push($unCleanedGamesInfo,$tempList[0]);
            break;
        }
        $gamesInfo =$this->cleanView($unCleanedGamesInfo);
        return view('profile.favorites',[
            'wishlist_games_test' =>$gamesInfo,
        ]);
    }

    public function comments()
    {
        $user_comments=comments::where('user_id', Auth::user()->id)->get();
        $unCleanedGamesInfo=[];
        $gamesInfo=[];
        $emojis=['Hated it','Dislike it','it\'s ok','liked it','loved it'];


        foreach($user_comments as $oneComment){
            //dd($game->game_id);
            $tempList =  Http::withHeaders(config('services.igdb'))
                ->send('POST', 'https://api.igdb.com/v4/games?', 
                [
                    'body' => 'fields name , cover.url , rating , aggregated_rating,slug;
                    where id='.$oneComment->game_id .';'
                ]
                )->json();
                //dd($tempList);
            array_push($unCleanedGamesInfo,$tempList[0]);
        }
        $gamesInfo =$this->cleanView($unCleanedGamesInfo);
        //dd($gamesInfo);
        return view('profile.comments',[
            'games' =>$gamesInfo,
            'userComments'=> $user_comments,
            'emojis'=>$emojis,
        ]);
    }

    public function lists()
    {
        $countList=[];
        $user_lists=user_lists_table::where('user_id', Auth::user()->id)->get();
        foreach ($user_lists as $one_user_list) {
            $list_games_count=list_games::where('list_id', $one_user_list->list_id)->count();
            array_push($countList,$list_games_count);
        };
        

        return view('profile.lists',[
            'userLists' => $user_lists,
            'gamesNumber'=> $countList,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    //not used
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   
    public function update(ProfileUpdateRequest $request): RedirectResponse  
    {
       $request->validate([
             //'bio'=>'string',
             //'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

    
        $currentUser=user::where('id', Auth::user()->id)
        ->first();
        $path=$currentUser->photo;
        $oldBio=$currentUser->bio;
       
        if($request->hasFile('userPhoto')){
            //dump('in if'); 
            $photoName=time().$request->file('userPhoto')->getClientOriginalName();
            //stored in storage/app/public/userimgs
            $path=$request->file('userPhoto')->storeAs('userimgs',$photoName,'public');
        }
        
        user::where('id', Auth::user()->id)
        ->first()
        ->update([
            'photo' =>$request->hasFile('userPhoto')?'/storage/'.$path:$path,
            'bio'=> $request->input('bio')!=null?$request->input('bio'):$oldBio,
            ]);


        $request->user()->save();

        return Redirect::route('settings.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

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
