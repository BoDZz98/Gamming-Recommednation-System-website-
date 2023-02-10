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

    where slug=\"{$slug}\";" 

    platforms id [48=ps4 , 6=pc, 49=xbox one ,]   abbreviation

    Carbon\Carbon::parse (To use carbon in a view)

    https://via.placeholder.com/264x352

*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('index');
});

*/

Route::get('/',[GamesController::class,'index'])->name('games.index');
Route::get('/browse',[GamesController::class,'browse'])->name('games.browse');

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

