@extends('layouts.profile')
@section('content2')

<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Wishlist :</p>
<div class="px-16 lg:px-40">
    <div  class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-12 border-b border-gray-800 pb-16">
        @foreach($wishlist_games as $game)
            <div class="game mt-8 w-fit">  
                <div class="relative inline-block w-52">
                    <a href="{{ route( 'games.show',$game['slug'] ) }}">
                        <img src="{{ $game['coverImageUrl'] }}" alt="Game Cover" class=" h-60 rounded-lg w-44 hover:opacity-75 transition ease-in-out duration-150">
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


@endsection