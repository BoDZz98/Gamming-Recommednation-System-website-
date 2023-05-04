<?php

namespace App\Http\Livewire;

use App\Models\comments;
use App\Models\user_preference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class UserGames3 extends Component
{
    public $gameId;
    public $gameInput;
    public $desc;
    public $rating1;

    public function mount(){
        $this->gameInput=$this->gameId;
    }

    public function submit(){
        $this->validate([
            'rating1'=>'required',
        ]);
 
        $temp=user_preference::where('user_id', Auth::user()->id)
        ->where('game_id', $this->gameInput)->first();

        $commentTemp=comments::where('user_id', Auth::user()->id)
        ->where('game_id', $this->gameInput)->first();
       
        //comment with no desc
        if($this->desc==null){
            log::info('in if');
            
             //if he didn't rate this game yet
             if($temp==null){
                createRating($this->gameInput,$this->rating1);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Successfully rated this game'); 
            }
            //updating the old rating
            else{
                updateRating($this->gameInput,$this->rating1);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Rating updated successfully'); 
            }
        }
        //comment with desc
        else{
            //log::info('in else');
            
            //creating new records            
            if($temp==null){
                createRating($this->gameInput,$this->rating1);
                createComment($this->gameInput,$this->desc,$this->rating1);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Comment added successfully'); 
            }
            //updating existing records
            else{
                updateRating($this->gameInput,$this->rating1);

                if ($commentTemp==null) {
                    createComment($this->gameInput,$this->desc,$this->rating1);
                    return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Comment added successfully'); 

                }
                else{
                    updateComment($this->gameInput,$this->desc,$this->rating1);
                    return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Comment updated successfully'); 
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.user-games3');
    }
}

function createRating($game_id,$rating){
    user_preference::create([
        'user_id'=>Auth::user()->id,
        'game_id'=>$game_id,
        'rating'=>$rating,
    ]);
}

function updateRating($game_id,$rating){
    user_preference::where('user_id', Auth::user()->id)
    ->where('game_id', $game_id)
    ->update(['rating' => $rating]);
}

function createComment($game_id,$comment_description,$rating){
    comments::create([
        'user_id'=>Auth::user()->id,
        'game_id'=>$game_id,
        'comment_description'=>$comment_description,
        'stars'=>$rating,
    ]);
}

function updateComment($game_id,$comment_description,$rating){
    comments::where('user_id', Auth::user()->id)
    ->where('game_id', $game_id)
    ->update([
        'stars' => $rating,
        'comment_description'=>$comment_description,
    ]);
}