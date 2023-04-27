@extends('layouts.my_app')
@section('content')

<div class="px-28" x-data="{ addComment:false }">
    <div class="bg-gray-800 rounded-3xl p-14">
        <div class="p-16 bg-gray-900 rounded-3xl  flex flex-col lg:flex-row">
            <div class="flex-none lg:w-1/5 lg:h-1/4 ">
                <img src="{{ $list['list_image_path'] }}" alt="game cover" class=" rounded-lg ">
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-80 flex flex-col space-y-8">
                <h2 class="fone-semibold text-4xl">{{$list['list_name']}}</h2>
                <h2 class="fone-semibold text-1xl">Games : {{$gameNumber}}</h2>
                <p class="mt-6 text-gray-400 hidden lg:block "> {{$list->list_description}}</p>
                
                <!-- Edit List model here -->
                <div 
                style="background-color: rgba(0, 0, 0, .5);" x-show="addComment"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-80  overflow-y-auto">
                        <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl ">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    class="text-3xl leading-none text-white hover:text-gray-400"
                                    @click="addComment = false"
                                    @keydown.escape.window="addComment = false"
                                >
                                    &times;
                                </button>
                            </div>

                            <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Edit Your List</p>
                            @livewire('add-edit-list',['listId' => $list['list_id'],'functionName'=>'update'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <button  class=" inline-flex bg-purple-600 rounded-lg text-white  font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                    @click="addComment = true">
                        <h1 class=" ml-2"> Edit List</h1> 
                </button> 
            </div>   
        </div>
        
        <div class="my-8 bg-gray-900 rounded-3xl p-16  ">
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">List </span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
            @if(count($listGame) == 0)
                <h1 class=" uppercase text-2xl tracking-wide font-extrabold mt-10">No Games in this list </h1>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-12">
                @foreach($listGame as $game)
                    <div class="game mt-8 w-fit self-center lg:px-16">  
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

    </div>
</div>


@endsection