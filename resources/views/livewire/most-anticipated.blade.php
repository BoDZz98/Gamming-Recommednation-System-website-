<div wire:init="loadMostAnticipated" class="bg-gray-800 rounded-lg p-4">
 <span class=" uppercase underline tracking-wide text-2xl font-extrabold">Most</span>
 <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Anticipated</span>
 <!-- <span><h2 class=" uppercase  tracking-wide font-semibold">Most Anticipated</h2></span> -->
    @foreach($mostAnticipatedGames as $oneGame)
        <div class="most-anticpated-container mt-8 space-y-8 bg-gray-900 rounded-xl p-4">
            <!-- Game card container for most anticpated -->
            <div class="gamecard flex">
                @if(array_key_exists('cover',$oneGame))
                <a href="#">
                    <img src="{{ $oneGame['coverImageUrl'] }}" alt="Game Cover" class="  w-16  hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @else
                <a href="#">
                    <img src="https://via.placeholder.com/264x352" alt="Game Cover" class="  w-16  hover:opacity-75 transition ease-in-out duration-150">
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