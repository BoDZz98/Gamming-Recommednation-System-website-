<?php

namespace App\Http\Livewire;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserGames extends Component
{
    public $currentPage=1;
    public $pages=[
        1=>'choose game 1',
        2=>'choose game 2'
    ];

    public function goToNextPage(){
        
        Log::info('clicked');

        $this->currentPage++;
    }

    public function goToPreviousPage(){
        $this->currentPage--;
    }

    public function render()
    {
        
        Log::info('This is some useful information.');


        return view('livewire.user-games');
    }
}
