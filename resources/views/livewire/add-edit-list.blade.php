<div>
    <div class=" flex flex-col items-center">
        <form method="POST" class="w-1/2" wire:submit.prevent="submit"  enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-7">
                <input type="text" class=" h-12 rounded px-3 bg-black"  wire:model.lazy="listName" placeholder="List Name" />
                @error('listName')
                    <span class="text-xs text-red-500"> List Name Is Required</span>
                @enderror

                <textarea type="text" class="w-full rounded p-3 bg-black h-20"  wire:model.lazy="listDesc" value="{{ old('offer_ratio')}}" placeholder="List Description"></textarea>
                @error('listDesc')
                    <span class="text-xs text-red-500"> List Description Is Required</span>
                @enderror

                <button class="bg-white w-full rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 
            </div>
        </form>
    </div>
</div>
