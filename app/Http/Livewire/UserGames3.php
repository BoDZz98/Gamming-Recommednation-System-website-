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

        if($this->desc==null){
            log::info('in if');
            /* user_preference::create([
                'user_id'=>Auth::user()->id,
                'game_id'=>$this->gameInput,
                'rating'=>$this->rating1,
            ]); */
        }
        else{
            log::info('in else');

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
            
            return redirect()->route('comments.index',$this->gameId ); 
        }
    }

    public function render()
    {
        return view('livewire.user-games3');
    }
}
