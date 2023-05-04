<div wire:init="loadPopularGames">
    <div class="flex flex-col space-y-4  items-center">
        {{-- Game --}}
        @foreach($tempPopularGames as $game)
        @if ($loop->first)
        
            <input type="hidden"  name="game1" wire:model.lazy="game1" id='game1' {{-- value="{{ $tempPopularGames['id'] }}" --}} class="text-black " />
            <img src="{{ $tempPopularGames['coverImageUrl'] }}" class=" w-fit h-fit rounded-lg " >
            <p class=" text-white  w-fit" >{{$tempPopularGames['name']}}</p>
            
        @endif
        @endforeach
        {{-- Rating Emojis --}}
        <x-user-preference.all-emoji name='rating1' 
            isActive='isActive1' isActive2='isActive12' isActive3='isActive13' isActive4='isActive14' isActive5='isActive15'
            id='star1' id2='star12' id3='star13' id4='star14' id5='star15' 
        />
    </div>
    {{-- Buttons Div --}}
    <div class="flex items-center justify-between space-x-5 px-4 py-3 text-right sm:px-6">
        {{-- @if($currentPage===1)
            <div></div>
        @else
            <button wire:click="goToPreviousPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="button" >Back</button> 
        @endif --}}
        @if(false) {{-- $currentPage===count($pages) --}}
            <button class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="submit" >submit</button> 
        @else
            <div></div>
            <button wire:click="goToNextPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800  hover:text-white  transition ease-in-out duration-300" type="button" >Next/Haven't Played</button> 
        @endif

    </div>
</div>
