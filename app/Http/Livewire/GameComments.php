<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class GameComments extends Component
{
    public $gameId;
    public $commentCount;
    public $allComments=[];
    public $emojis=['Hated it','Dislike it','it\'s ok','liked it','loved it'];

    public $currentUserPhoto;

    public function loadComments(){
        $this->allComments=DB::table('comments')
        ->join('users','comments.user_id','=','users.id')
        ->select('comments.comment_description as desc','comments.stars as rating',
        'users.name as userName')
        ->where('game_id','=',$this->gameId)
        ->get();
        //dd($this->allComments);
                
        $currentUser=User::where('id', Auth::user()->id)
        ->first();
        $this->currentUserPhoto=$currentUser->photo;
    }
    public function render()
    {
        return view('livewire.game-comments');
    }
}
