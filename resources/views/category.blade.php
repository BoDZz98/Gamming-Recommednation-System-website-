@extends('layouts.app')
@section('content')

<div class="bg-gray-900 px-28 ">

    <div class="bg-gray-800 rounded-3xl p-8 h-fit ">
        <div class="w-full mr-0 lg:mr-32  rounded-xl p-4 ">
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Category:</span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600">{{$categoryname}}</span>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            @foreach($categoryGames as $game)
                <div class="game mt-8 bg-gray-900 p-8 rounded-xl w-60">  
                    <div class="relative inline-block w-52">
                        <a href="{{ route( 'games.show',$game['slug'] ) }}">
                            <img src="{{ $game['coverImageUrl'] }}" alt="Game Cover" class=" h-60 rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @if($game['rating'])
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: 20px; bottom: -15px;">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    {{ $game['rating'] }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route( 'games.show',$game['slug'] ) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{$game['name']}}</a>
                    <div class="text-gray-400 mt-1 "> 
                        {{ $game['platforms'] }}
                    </div>
                </div>
                @endforeach 
            </div>
            
     
        </div>
    </div>
</div>

@endsection