<div wire:init="loadCommingSoon" class="bg-gray-800 rounded-lg p-4">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Comming</span>
    <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Soon</span>
    @foreach($commingSoonGames as $oneGame) 
        <div class="comming-soon mt-8 space-y-10 bg-gray-900 rounded-xl p-4">
            <!-- Game card container for most anticpated -->
            <div class="gamecard flex  ">
                @if(array_key_exists('cover',$oneGame))
                <a href="#">
                    <img src="{{ $oneGame['coverImageUrl'] }}" alt="Game Cover" class="  w-16  hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @endif
                <div class="ml-4">
                    <a href="#" class="hover:text-gray-300">{{ $oneGame['name'] }}</a>
                    <div class="text-gray-400 text-sm mt-1">{{ $oneGame['first_release_date'] }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
