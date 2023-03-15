<div >
    <form wire:submit.prevent="submit" method="post">
        @csrf
        
        <input type="hidden" name='gameId' wire:model.lazy="gameInput">
        <label for="desc" class="mb-2">Comment Description</label>
        <textarea type="text" class="w-full rounded p-3 mb-2 bg-black h-36" id="desc" name="desc" wire:model.lazy="desc" placeholder="comment"></textarea>

        <x-user-preference.all-emoji name='rating1' 
        isActive='isActive21' isActive2='isActive22' isActive3='isActive23' isActive4='isActive24' isActive5='isActive25'
        id='star21' id2='star22' id3='star23' id4='star24' id5='star25' />
        @error('rating1')
            <span class="text-xs text-red-500  flex justify-center"> Rating Is Required</span>
        @enderror 

        <div class="text-right mt-2">
            <button class="bg-white w-full lg:w-1/2  rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="submit" >submit</button> 
        </div>
        
    </form>
</div>
