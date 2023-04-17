<div wire:init="loadCommingSoon" class="bg-gray-800 rounded-lg p-4">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Comming</span>
    <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Soon</span>
    @forelse($commingSoonGames as $oneGame) 
        <div class="comming-soon mt-8 space-y-10 bg-gray-900 rounded-xl p-4">
            <!-- Game card container for most anticpated -->
            <div class="gamecard flex  ">
                @if(array_key_exists('cover',$oneGame))
                <a href="{{ route( 'games.show',$oneGame['slug'] ) }}">
                    <img src="{{ $oneGame['coverImageUrl'] }}" alt="Game Cover" class="  w-16  hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @endif
                <div class="ml-4">
                    <a href="{{ route( 'games.show',$oneGame['slug'] ) }}" class="hover:text-gray-300">{{ $oneGame['name'] }}</a>
                    <div class="text-gray-400 text-sm mt-1">{{ $oneGame['first_release_date'] }}</div>
                </div>
            </div>
        </div>
    @empty
    <div class="most-anticpated-container mt-8 space-y-8 bg-gray-900 rounded-xl p-4">
            <!-- Game card container for most anticpated -->
            @foreach(range(1,4) as $game)
            <div class="gamecard flex ">
                <div class="bg-gray-600 w-16 h-20 flex-none"></div>
                <div class="ml-4">
                    <div class="text-transparent bg-gray-700 rounded leading-tight">title goes here today</div>
                    <div class="text-transparent bg-gray-700 rounded inline-block text-sm mt-2">May 20 , 2001</div>
                </div>
            </div>
            @endforeach
        </div>
    @endforelse
</div>
