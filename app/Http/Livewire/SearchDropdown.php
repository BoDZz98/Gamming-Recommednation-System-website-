<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search='';
    public $searchResult=[];

    public function render()
    {
        $this->searchResult=Http::withHeaders(config('services.igdb'))
        ->send('POST', 'https://api.igdb.com/v4/games?', 
        [
            'body' => 'fields name , cover.url , slug;
            search "'.$this->search.'" ;
            limit 8; '
        ]
        )->json();
        //dump($this->searchResult);
        return view('livewire.search-dropdown');
    }
}
