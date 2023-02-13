<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input wire:model.debounce.300ms="search" 
    type="text" 
    class="bg-gray-800 text-sm rounded-full pl-8 focus:outline-none focus: px-3 py-1 w-64" 
    placeholder="search (Press '/' to focus)"
    x-ref="search"
    @keydown.window="
        if(event.keyCode==191){
            event.preventDefault();
            $refs.search.focus();
        }
    "
    @focus="isVisible = true"
    @keydown.escape.window="isVisible = false"
    @keydown="isVisible = true">
    
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-search w-4 h-4" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
        <div class="spinner ml-56 top-0 mt-3" style="position: absolute" wire:loading ></div>
    </div>
   
    @if(strlen($search >=3))
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show.transition.opacity.duration.500="isVisible">
            @if(count($searchResult)==0)
                <div class="px-3 py-3">
                    No results for "{{$search}}"
                </div>  
            @else
                <ul>
                    @foreach($searchResult as $oneResult)
                        <li class="border-b border-gray-700">
                            <a href="{{ route( 'games.show',$oneResult['slug'] ) }}" class=" hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                                @if(isset($oneResult['cover']))
                                    <img src="{{Str::replaceFirst('thumb','cover_small', $oneResult['cover']['url'])}}" alt="cover" class="w-10">
                                @else
                                    <img src="https://via.placeholder.com/264x352" alt="game cover" class="w-10"> 
                                @endif
                                <span class="ml-4">{{$oneResult['name']}}</span>
                            </a>
                        </li>
                    @endforeach  
                </ul>
            @endif
        </div>
    @endif

</div>