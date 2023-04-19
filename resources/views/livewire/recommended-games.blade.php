<div wire:init="loadRecommendedGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  xl:grid-cols-4  gap-12 border-b border-gray-800 pb-16">
    <!-- Single game card --> <!-- wire:init="loadPopularGames" -->
    @forelse($recommendedGames as $game)
        <div class="game mt-8 bg-gray-900 p-8 rounded-xl w-60">  
            <div class="relative inline-block w-52">
                <a href="{{ route( 'games.show',$game['slug'] ) }}">
                    <img src="{{ $game['coverImageUrl'] }}" alt="Game Cover" class=" h-60 rounded-lg w-44 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @if($userGames[$loop->index]['rating'])
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: 20px; bottom: -15px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{$userGames[$loop->index]['rating'] }}%
                        </div>
                    </div>
                @endif
            </div>
            <a href="{{ route( 'games.show',$game['slug'] ) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{$game['name']}}</a>
            <div class="text-gray-400 mt-1 "> 
                {{ $game['platforms'] }}
            </div>
        </div>
    @empty
   @foreach(range(1,8) as $game)
    <div class="game mt-8 bg-gray-900 p-8 rounded-xl w-60">  
        <div class="relative inline-block ">
            <div class=" bg-gray-700 w-44 h-56 "></div>
        </div>
        <div class="block text-lg text-transparent bg-gray-700 rounded w-40 mt-4">Title goes here</div>
        <div class="text-transparent bg-gray-700 rounded mt-3 inline-block"> 
            PS , XBOX , PC
        </div>
    </div>
    @endforeach
 
 
    @endforelse
    

</div>  <!-- popular games ended --> 