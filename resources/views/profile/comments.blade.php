@extends('layouts.profile')
@section('content2')

<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Your Comments :</p>
<div class="px-10 py-6 space-y-8">
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
    <!-- second comment -->
    
</div>

@endsection