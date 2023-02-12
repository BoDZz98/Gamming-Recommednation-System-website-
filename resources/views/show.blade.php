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
                <span class="text-gray-500">{{ $game['involved_companies'][0]['company']['name'] }}</span>
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

                <svg class="svg-icon" viewBox="0 0 20 20">
					<path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"></path>
				</svg>

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