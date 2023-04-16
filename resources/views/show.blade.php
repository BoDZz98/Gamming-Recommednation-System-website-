@extends('layouts.my_app')
@section('content')

<div class="container mx-auto px-4">
    @livewire('upper-part' , ['slug' => $slug])
    <!--  End game Details -->
    @livewire('middle-part' , ['slug' => $slug])
    <!-- End images container -->

    <div class="similar-games-container border-gray-800 pb-12 mt-8 bg-gray-800 rounded-3xl p-12">
        <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Similar</span>
        <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>

        <div class=" text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        <!-- Single Game Card -->
        @foreach($game['similarGames'] as $oneGame)
            <div class="game mt-8 bg-gray-900 p-8 rounded-xl">  
                <div class="relative inline-block w-32">
                    @if($oneGame['similarGamesCover'])
                        <a href="{{ route( 'games.show',$oneGame['slug'] ) }}">
                            <img src="{{  $oneGame['similarGamesCover'] }}" alt="Game Cover" class="rounded-lg h-44 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    @endif
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $oneGame['similarGamesRating']}}                
                        </div>
                    </div>
                </div>
                <a href="{{ route( 'games.show',$oneGame['slug'] ) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{$oneGame['name']}}</a>
                <div class="text-gray-400 mt-1 ">
                    
                    {{$oneGame['similarGamesPlatforms']}}
                </div>
            </div>
        @endforeach
        </div>
    </div> <!-- End similar-games -->
</div>

@endsection