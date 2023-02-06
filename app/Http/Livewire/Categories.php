<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Categories extends Component
{
    public $genresInfo=[];
    public function loadCategories()
    {
        $this->genresInfo=[
            ['genreName'=>'Shooter','genreImg'=>'/imgs/shooter.jpg','genreId'=>5],
            ['genreName'=>'Adventure','genreImg'=>'/imgs/adv.jpg','genreId'=>31],
            ['genreName'=>'Puzzle','genreImg'=>'/imgs/Puzzle.jpg','genreId'=>9],
            ['genreName'=>'Racing','genreImg'=>'/imgs/Racing.jpg','genreId'=>10],
            ['genreName'=>'Sports','genreImg'=>'/imgs/Sports.jpg','genreId'=>14],
        ];
    }
    public function render()
    {
        return view('livewire.categories');
    }
}
