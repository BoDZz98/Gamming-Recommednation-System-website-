@extends('layouts.profile')
@section('content2')
<!-- overview  md:ml-16 lg:ml-20 xl:ml-40 gap-y-10  -->
<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Overview</p>
<div class="px-12 lg:px-32">
    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-10">{{-- bg-red-500 --}}
        <a href="/profile/favorites">
            <div class="w-52 h-78  rounded-lg bg-gray-800 px-5 pt-3">
                @if (isset($games_fav['coverImageUrl']))
                    <img  alt="Game Cover" src="{{$games_fav['coverImageUrl']}}" class="h-60  w-48 hover:opacity-75 transition ease-in-out duration-150 rounded">                    
                @endif

                <p class="text-lg font-semibold underline">FAVORITE GAMES</p>
                <p class="text-s">Games: {{$fav_games_num}}</p>
            </div>
        </a>    

        <a href="/profile/wishlist">
            <div class="w-52 h-78  rounded-lg bg-gray-800 px-5 pt-3">
                @if (isset($games_wish['coverImageUrl']))
                    <img  alt="Game Cover" src="{{$games_wish['coverImageUrl']}}" class="h-60  w-48 hover:opacity-75 transition ease-in-out duration-150 rounded">                    
                @endif

                <p class="text-lg font-semibold underline">WISHLIST</p>
                <p class="text-s">Games: {{$wish_games_num}}</p>
            </div>
        </a> 

        <a href="/profile/lists">
            <div class="w-52 h-78  rounded-lg bg-gray-800 px-5 pt-3">
                @if ($list_photo!=1)
                    <img src="{{ $list_photo }}" alt="game cover" class=" h-60  w-48 hover:opacity-75 transition ease-in-out duration-150 rounded">
                @endif

                <p class="text-lg font-semibold underline">COLLECTIONS :</p>
                <p class="text-s">Lists: {{ $list_num }}</p>
            </div>
        </a> 
    </div>
</div>
<!-- recent comments -->
<div class="p-7 border-t-2 border-gray-800 space-y-7">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Recently</span>
    <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Commented</span>
    @if (count($userComments)==0)
       <h1 class="mt-4 text-lg font-semibold">No Comments To Show Yet!</h1> 
    @endif
    @foreach ($userComments as $oneUserComment )
        <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 ">
            <div class="relative flex-none ">
                <!-- Image -->
                <a href="{{ route( 'games.show',$games[$loop->index]['slug'] ) }}">
                    <img  alt="Game Cover" src="{{ $games[$loop->index]['coverImageUrl'] }}" class="h-60  w-48 hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <!-- Game Name and details  / Right part -->
            <div class="ml-6 lg:ml-12">
                <a href="#" class="block text-lg font-semibold leading-tight mt-4 hover:text-gray-400  ">{{ $games[$loop->index]['name'] }}</a>
                <div class="flex flex-row space-x-4 mt-4 justify-center"> 
                    @foreach(range(0,4) as $any)
                        @if($loop->index+1==$oneUserComment->stars)
                            <div class="flex flex-col">
                                <img src="/imgs/{{($loop->index+1)}}.png" class="w-10 h-10 opacity-100 -translate-y-1 scale-110">
                                <p>{{$emojis[$loop->index]}}</p>
                            </div>
                        @else
                            <img src="/imgs/{{($loop->index+1)}}.png" class="w-10 h-10 opacity-50 " >
                        @endif
                    @endforeach
                </div>
                <p class="mt-6 text-gray-400 hidden lg:block "> {{$oneUserComment->comment_description}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection