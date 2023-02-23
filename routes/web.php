<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\SettingsController;

/* 
    for searching for file -> ctrl+p 

    IGDb acces token is in the .env file and services.php

    php artisan make:livewire popular-games

    php artisan make:controller PhotoController -r

    php artisan make:model small_letters_table -m

    php artisan migrate

    php artisan migrate:refresh

    where slug=\"{$slug}\";" 

    platforms id [48=ps4 , 6=pc, 49=xbox one ,]   abbreviation

    Carbon\Carbon::parse (To use carbon in a view)

    https://via.placeholder.com/264x352

    {{ Auth::user()->name }}

    @livewire('upper-part' , ['slug' => $slug])

    <!-- @if($game['platforms'])
                        @foreach($oneGame['platforms'] as $platform)
                            @if(array_key_exists('abbreviation',$platform))
                                {{$platform['abbreviation']}},
                            @endif
                        @endforeach 
                    @endif -->

*/


Route::redirect(uri:'/',destination:'login');

Route::get('/home',[GamesController::class,'index'])->name('games.index');
Route::get('/browse',[GamesController::class,'browse'])->name('games.browse');
Route::post('/games',[GamesController::class,'getGames'])->name('games.get');

Route::get('/games/{slug}',[GamesController::class,'show'])->name('games.show');
Route::get('/category/{name}',[GamesController::class,'categoryGames'])->name('games.categoryGames');

Route::get('/profile/overview',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/favorites',[ProfileController::class,'favorites'])->name('profile.favorites');
Route::get('/profile/wishlist',[ProfileController::class,'wishlist'])->name('profile.wishlist');
Route::get('/profile/comments',[ProfileController::class,'comments'])->name('profile.comments');
Route::get('/profile/lists',[ProfileController::class,'lists'])->name('profile.lists');


Route::get('/settings',[SettingsController::class,'index'])->name('settings.index');
Route::get('/email',[SettingsController::class,'email'])->name('settings.email');
Route::get('/password',[SettingsController::class,'password'])->name('settings.password');


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
