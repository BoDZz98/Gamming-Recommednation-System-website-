<div wire:init="loadCommingSoon">
@foreach($commingSoonGames as $oneGame) 
    <div class="most-anticpated-container mt-8 space-y-10">
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
