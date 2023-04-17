<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;


class MiddlePart extends Component
{
    public $middlePart=[]; 
    public $slug;

    public function loadMiddlePart()
    {
        $gameSlug=$this->slug;
        $middlePartCleaned  = Http::withHeaders(config('services.igdb'))
            ->send('POST', 'https://api.igdb.com/v4/games?', 
            [
                'body' => "fields screenshots.url;
                where slug=\"{$gameSlug}\";" 
            ]
            )->json();
        
         
        $this->middlePart =$this->cleanView($middlePartCleaned);
        
    }

    public function render()
    {
        return view('livewire.middle-part');
    }

    private function cleanView($games){
        return collect($games)->map(function ($game){
            return collect($game)->merge([
                'screenshots'=>isset($game['screenshots'])
                ?collect($game['screenshots'])->map(function($oneScreenshot){
                    return [
                        'big'=>Str::replaceFirst('thumb','screenshot_big', $oneScreenshot['url']),
                        'huge'=>Str::replaceFirst('thumb','screenshot_huge', $oneScreenshot['url']),
                    ];
                })
                :null,
    
                ]);
        })->toArray();
    }
}
