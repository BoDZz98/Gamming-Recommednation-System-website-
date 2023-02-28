<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\user_preference;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserGames extends Component
{
    public $name;
    public $email;
    public $pass;
    public $confirmPass;
    public $game1;
    public $rating1;

    public $currentPage=1;
    public $pages=[
        1=>'',
        2=>'choose game 1',
        3=>'choose game 2',
    ];

    public function goToNextPage(){
        
        Log::info('clicked');

        $this->currentPage++;
    }

    public function goToPreviousPage(){
        $this->currentPage--;
    }

    public function submit(){
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->pass),
        ]);
        /* user_preference::create([
            'user_id'=>'99',
            'game_id'=>$this->game1,
            'rating'=>$this->rating1,
        ]); */
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function render()
    {
        
        Log::info('This is some useful information.');


        return view('livewire.user-games');
    }
}
