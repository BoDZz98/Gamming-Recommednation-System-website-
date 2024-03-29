<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ModelGameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendDataController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
for searching for file -> ctrl+p

IGDb acces token is in the .env file and services.php

php artisan make:livewire popular-games

php artisan make:controller PhotoController -r

php artisan make:model small_letters_table -m

    php artisan make:migration create_flights_table

    php artisan migrate

php artisan migrate:refresh

where slug=\"{$slug}\";"

platforms id [48=ps4 , 6=pc, 49=xbox one ,]   abbreviation

Carbon\Carbon::parse (To use carbon in a view)

https://via.placeholder.com/264x352

{{ Auth::user()->name }}

@livewire('upper-part' , ['slug' => $slug])


 */

Route::redirect(uri:'/', destination:'login');
Route::get('/recommendations', [ModelGameController::class, 'recommendations'])->name('games.recommendations');
#Route::post('/testing/{id}', [GamesModelController::class, 'gamesTesting'])->name('games.gamesTesting');

Route::get('/home', [GamesController::class, 'index'])->name('games.index');
Route::get('/browse', [GamesController::class, 'browse'])->name('games.browse');
Route::post('/games', [GamesController::class, 'getGames'])->name('games.getGames');
Route::post('/storeUserGames', [GamesController::class, 'store'])->name('games.store');

Route::get('/games/{slug}',[GamesController::class,'show'])->name('games.show');
Route::get('/category/{name}',[GamesController::class,'categoryGames'])->name('games.categoryGames');
Route::get('/addTofav/{id}',[GamesController::class,'addGameToFavorites'])->name('games.addGameToFavorites');
Route::get('/removeFromFav/{id}',[GamesController::class,'removeGamefromFavorites'])->name('games.removeGamefromFavorites');
Route::get('/addToWish/{id}',[GamesController::class,'addGameToWishList'])->name('games.addGameToWishList');
Route::get('/removeFromWish/{id}',[GamesController::class,'removeGamefromWishList'])->name('games.removeGamefromWishList');
Route::get('/addToUserList/{gameId}/{listId}',[GamesController::class,'addGameToUserList'])->name('games.addGameToUserList');

Route::get('/comments/{id}',[CommentsController::class,'index'])->name('comments.index');
Route::post('/storeComment',[CommentsController::class,'store'])->name('comments.store');

Route::get('/profile/overview', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/favorites', [ProfileController::class, 'favorites'])->name('profile.favorites');
Route::get('/profile/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
Route::get('/profile/comments', [ProfileController::class, 'comments'])->name('profile.comments');
Route::get('/profile/lists', [ProfileController::class, 'lists'])->name('profile.lists');

Route::get('/listDetails/{id}',[ListController::class,'index'])->name('list.index');
route::delete('listDelete/{id}',[ListController::class,'destroy'])->name('list.destroy');


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

require __DIR__ . '/auth.php';
