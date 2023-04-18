<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\user_lists_table;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{

    public function index(){
        //testing
        /* user_lists_table::create([
            'list_id'=>300,
            'user_id' => 1,
            'list_name' => 'list 1',
            'list_description' => 'this is list one',
            'list_image_path' => '0',
            
        ]); */

        $user=User::find(Auth::user()->id);
        $lists=$user->lists;
        //dump($user);
        return view('profile.overview');
    }

    public function favorites(){
        return view('profile.favorites');
    }

    public function wishlist()
    {
        return view('profile.wishlist');
    }

    public function comments()
    {
        return view('profile.comments');
    }

    public function lists()
    {
        //
        return view('profile.lists');
    }
    /**
     * Display the user's profile form.
     */
    //not used
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   
    public function update(ProfileUpdateRequest $request): RedirectResponse  
    {
       $request->validate([
             //'bio'=>'string',
        ]);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

    
        $currentUser=user::where('id', Auth::user()->id)
        ->first();
        $path=$currentUser->photo;
        $oldBio=$currentUser->bio;
       
        if($request->hasFile('userPhoto')){
            dump('in if'); 
            $photoName=time().$request->file('userPhoto')->getClientOriginalName();
            //stored in storage/app/public/userimgs
            $path=$request->file('userPhoto')->storeAs('userimgs',$photoName,'public');
        }
        
        user::where('id', Auth::user()->id)
        ->first()
        ->update([
            'photo' =>'/storage/'.$path,
            'bio'=> $request->input('bio')!=null?$request->input('bio'):$oldBio,
            ]);


        $request->user()->save();

        return Redirect::route('settings.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
