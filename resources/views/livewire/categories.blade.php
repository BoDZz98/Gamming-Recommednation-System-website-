<div wire:init="loadCategories">
    <div class="category-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3  2xl:grid-cols-5 ">
        @forelse($genresInfo as $genre)
            <div class="game mt-8">  <!-- first -->
                <div class="relative inline-block ">
                    <a href="{{ route( 'games.categoryGames',$genre['genreName'] ) }}">
                        <img src="{{ $genre['genreImg'] }}" alt="Game Cover" class=" h-52 w-60 rounded-xl hover:opacity-75 transition ease-in-out duration-300">
                    </a>
                </div>
                <a href="{{ route( 'games.categoryGames',$genre['genreName'] ) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{ $genre['genreName'] }}</a>
            </div>
        @empty
            @foreach(range(1,5) as $game)
                <div class="game mt-8">  
                    <div class="relative inline-block ">
                        <div class=" bg-gray-800 w-60 h-52 rounded-xl"></div>
                    </div>
                    <div class="block text-lg text-transparent bg-gray-700 rounded w-40 mt-4">Title goes here</div>
                   
                </div>
            @endforeach
        @endforelse
    </div>
</div>
