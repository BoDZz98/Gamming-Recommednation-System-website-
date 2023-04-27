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
    public $oldlistPhoto;
    public $listPhoto;
    public $listId;
    public $functionName;


    public function submit(){
        
        $this->validate([
            'listName'=>'required',
            'listDesc'=>'required',
            'listPhoto' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        

        $photoName=time().$this->listPhoto->getClientOriginalName();
            //stored in storage/app/public/listImgs
        $path=$this->listPhoto->storeAs('listImgs',$photoName,'public');

        $temp=user_lists_table::where('user_id',  Auth::user()->id)
        ->where('list_name', $this->listName)
        ->first();
        if ($temp!=null){
            return redirect()->route('profile.lists')->with('errorMessage','List Name Already Exists');
        }
        try{
            user_lists_table::create([
                'list_id'=>rand(),
                'user_id' => Auth::user()->id,
                'list_name' => $this->listName,
                'list_description' => $this->listDesc,
                'list_image_path' => '/storage/'.$path,
            ]);
            return redirect()->route('profile.lists')->with('sucMessage','Successfully Added This List');      
        }
        catch(Exception $e){
            return redirect()->route('profile.lists')->with('errorMessage','List Name Already Exists');
        }
    }

    public function update(){
        //dd($this->listPhoto);
        if($this->listPhoto!=null){
            $photoName=time().$this->listPhoto->getClientOriginalName();
                //stored in storage/app/public/listImgs
            $path=$this->listPhoto->storeAs('listImgs',$photoName,'public');
        }
        user_lists_table::where('list_id', $this->listId)
        ->update([
            'list_name' => $this->listName,
            'list_description' => $this->listDesc,
            'list_image_path' =>$this->listPhoto!=null? '/storage/'.$path:$this->oldlistPhoto,
        ]);

        return redirect()->route('list.index',$this->listId )->with('sucMessage','List Updated Successfully '); 
    }


    public function render()
    {
        if($this->listId!=null){
            $userList=user_lists_table::where('list_id', $this->listId)->first();
            $this->listName=$userList->list_name;
            $this->listDesc=$userList->list_description;
            $this->oldlistPhoto=$userList->list_image_path;
        }
        return view('livewire.add-edit-list');
    }
    
}

