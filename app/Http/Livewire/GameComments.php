<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class GameComments extends Component
{
    public $gameId;
    public function render()
    {
        Log::info($this->gameId);
        return view('livewire.game-comments');
    }
}
