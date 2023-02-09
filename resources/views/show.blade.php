@extends('layouts.app')
@section('content')

<div class="container mx-auto px-4">
    <div class="game-details border-b border-gray-800 pb-16 flex flex-col lg:flex-row">
        
        <div class="flex-none ">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class=" rounded-lg "><!-- no W and H -->
        </div>
        
        <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-64">
            <h2 class="fone-semibold text-4xl">{{$game['name']}}</h2>
            <div class="text-grey-400">
                <span>{{$game['genres']}}</span>
                &middot;
                <span>{{ $game['involved_companies'][0]['company']['name'] }}</span>
                &middot;
                <span>{{ $game['platforms'] }}</span>
            </div>
            <div class="flex flex-wrap items-center mt-8 ">
                <!-- first circle -->
                <div class="flex items-center">    
                    <div class="w-16 h-16 bg-gray-800 rounded-full " id="memberRating" >
                        <div id="memberRating"></div>
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $game['rating'] }}
                        </div>
                      
                    </div>
                    <div class="ml-4 text-xs">Member <br> Score</div>
                
                </div>
                <!-- second circle -->
                <div class="flex items-center ml-12">
                    
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $game['aggregated_rating'] }}                       
                        </div>
                    </div>

                    <div class="ml-4 text-xs">Critic <br> Score</div>
                
                </div>
                <div class="flex items-center space-x-4 mt-4  lg:mt-0 lg:ml-12">
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">a</a>
                    </div>

                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">a</a>
                    </div>

                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">a</a>
                    </div>

                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">a</a>
                    </div>
                </div>
            </div>

            <p class="mt-12"> {{$game['summary']}}</p>
             
            <div class="mt-12">
                <!-- <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                   <span class=" ml-2">Play Trailer</span> 
                </button> -->
                <a href="https://www.youtube.com/watch/{{$game['videos'][0]['video_id']}}" class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                   <span class=" ml-2">Play Trailer</span> 
                </a>
            </div>
        </div>
    </div> <!--  End game Details -->

    <div class="images-container mt-8  border-b border-gray-800 pb-12 ">
        <h2 class="text-blue-500 uppercase  tracking-wide font-semibold">Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
            <!-- One Image -->
            @foreach($game['screenshots'] as $oneScreenshot)
            <div >
                <a href="{{ Str::replaceFirst('thumb','screenshot_huge', $oneScreenshot['url']) }}" >
                    <img src="{{ Str::replaceFirst('thumb','screenshot_big', $oneScreenshot['url']) }}" alt="screenshots" class="  rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </a>
            </div> 
            @endforeach
        </div>
    </div> <!-- End images container -->

    <div class="similar-games-container border-gray-800 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase  tracking-wide font-semibold">Similar games</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        <!-- Single Game Card -->
        @foreach($game['similarGames'] as $oneGame)
            <div class="game mt-8">  
                <div class="relative inline-block w-32">
                    @if($oneGame['similarGamesCover'])
                        <a href="#">
                            <img src="{{  $oneGame['similarGamesCover'] }}" alt="Game Cover" class=" h-44 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    @endif
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $oneGame['similarGamesRating']}}                
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{$oneGame['name']}}</a>
                <div class="text-gray-400 mt-1 ">
                    <!-- @if($game['platforms'])
                        @foreach($oneGame['platforms'] as $platform)
                            @if(array_key_exists('abbreviation',$platform))
                                {{$platform['abbreviation']}},
                            @endif
                        @endforeach 
                    @endif -->
                    {{$oneGame['similarGamesPlatforms']}}
                </div>
            </div>
        @endforeach
        </div>
    </div> <!-- End similar-games -->
</div>

@endsection