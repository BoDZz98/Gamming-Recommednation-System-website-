<?php

namespace App\Http\Livewire;

use App\Models\user_lists_table;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEditList extends Component
{
    use WithFileUploads;
    public $listName;
    public $listDesc;
    public $listPhoto;

    public function submit(){
        $this->validate([
            'listName'=>'required',
            'listDesc'=>'required',
            'listPhoto' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $temp=user_lists_table::where('user_id', Auth::user()->id)
        ->where('list_name', $this->listName)
        ->first();

        $photoName=time().$this->listPhoto->getClientOriginalName();
            //stored in storage/app/public/listImgs
            $path=$this->listPhoto->storeAs('listImgs',$photoName,'public');
    try{
        if ($temp==null) {
            user_lists_table::create([
                'list_id'=>rand(),
                'user_id' => Auth::user()->id,
                'list_name' => $this->listName,
                'list_description' => $this->listDesc,
                'list_image_path' => '/storage/'.$path,
            ]);
            return redirect()->route('profile.lists')->with('sucMessage','Successfully Added This List'); 
        }
        else{
            /* sth wrong here */
            user_lists_table::where('user_id', Auth::user()->id)
        ->where('list_name', $this->listName)
        ->update([
            'list_name' => $this->listName,
            'list_description' => $this->listDesc]);

        return redirect()->route('profile.lists')->with('sucMessage','List Updated Successfully '); 

        }
        
    }
    catch(Exception $e){
        return redirect()->route('profile.lists')->with('errorMessage','List Name Already Exists');
        }
    }
    public function render()
    {
        return view('livewire.add-edit-list');
    }
}

