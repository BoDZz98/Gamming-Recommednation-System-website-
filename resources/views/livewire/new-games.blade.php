<div wire:init="loadNewGames" class="recently-reviewed-container space-y-12 mt-8 ">
    <!-- Game Card container --> <!-- wire:init="loadNewGames" -->
    @forelse($newGames as $oneNewGame)
        <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 ">
        
            <!-- Image and percentage container  / left part-->
            <div class="relative flex-none ">
                <!-- Image -->
                <a href="#">
                    <img src="{{ $oneNewGame['cover']['url'] }}" alt="Game Cover" class="h-60  w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <!-- percentage -->
                @if(isset($oneNewGame['rating']))
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{ $oneNewGame['rating'] }}
                    </div>
                </div>
                @endif 
            </div>
            <!-- Game Name and details  / Right part -->
            <div class="ml-6 lg:ml-12">
                <a href="#" class="block text-lg font-semibold leading-tight mt-4 hover:text-gray-400  ">{{ $oneNewGame['name'] }}</a>
                <div class="text-gray-400 mt-1 "> 
                    {{$oneNewGame['platforms']}}
                </div>
                <p class="mt-6 text-gray-400 hidden lg:block "> {{ $oneNewGame['summary'] }}</p>
            </div>
        </div>
    @empty
    @foreach(range(1,3) as $game)
    <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 ">
        <!-- Image and percentage container  / left part-->
        <div class="relative flex-none ">
            <!-- Image -->
            <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56 rounded"></div>
        </div>
        <!-- Game Name and details  / Right part -->
        <div class="ml-6 lg:ml-12">
            <div class="inline-block text-lg bg-gray-700 rounded mt-4 text-transparent">Title goes here</div>
            <div class="mt-8 space-y-4 hidden lg:block">
                <span class="text-transparent bg-gray-700 rounded inline-block"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, magnam? Lorem, ipsum dolor.</span>
                <span class="text-transparent bg-gray-700 rounded inline-block"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, magnam? Lorem, ipsum dolor.</span>
                <span class="text-transparent bg-gray-700 rounded inline-block"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, magnam? Lorem, ipsum dolor.</span>
            </div>
        </div>
    </div>
    @endforeach

    @endforelse 
</div> 