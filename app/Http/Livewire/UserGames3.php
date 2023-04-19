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

       
           
       
        //comment with no desc
        if($this->desc==null){
            log::info('in if');
            $temp=user_preference::where('user_id', Auth::user()->id)
             ->where('game_id', $this->gameInput)->first();
             //if he didn't rate this game yet
             if($temp==null){
                user_preference::create([
                    'user_id'=>Auth::user()->id,
                    'game_id'=>$this->gameInput,
                    'rating'=>$this->rating1,
                ]);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Successfully rated this game'); 

            }
            //updating the old rating
            else{
                user_preference::where('user_id', Auth::user()->id)
                ->where('game_id', $this->gameInput)
                ->update(['rating' => $this->rating1]);
                
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Rating updated successfully'); 
            }
        }
        //comment with desc
        else{
            //log::info('in else');
            $temp=user_preference::where('user_id', Auth::user()->id)
             ->where('game_id', $this->gameInput)->first();
            //creating new records            
            if($temp==null){
                user_preference::create([
                    'user_id'=>Auth::user()->id,
                    'game_id'=>$this->gameInput,
                    'rating'=>$this->rating1,
                ]);
                comments::create([
                    'user_id'=>Auth::user()->id,
                    'game_id'=>$this->gameInput,
                    'comment_description'=>$this->desc,
                    'stars'=>$this->rating1,
                ]);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Comment added successfully'); 
            }
            //updating existing records
            else{
                user_preference::where('user_id', Auth::user()->id)
                ->where('game_id', $this->gameInput)
                ->update(['rating' => $this->rating1]);
                
                comments::where('user_id', Auth::user()->id)
                ->where('game_id', $this->gameInput)
                ->update([
                    'stars' => $this->rating1,
                    'comment_description'=>$this->desc,
                ]);
                return redirect()->route('comments.index',$this->gameId )->with('sucMessage','Comment updated successfully'); 
            }
            
            
        }
    }

    public function render()
    {
        return view('livewire.user-games3');
    }
}
