@extends('layouts.my_app')
@section('content')

<div class="px-28" x-data="{ addComment:false }">
    <div class="bg-gray-800 rounded-3xl p-14">
        <div class="p-16 bg-gray-900 rounded-3xl  flex flex-col lg:flex-row">
            <div class="flex-none ">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class=" rounded-lg ">
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-64 flex flex-col space-y-8">
                <h2 class="fone-semibold text-4xl">{{$game['name']}}</h2>
                <h2 class="fone-semibold text-1xl">comments : 12</h2>
                <button  class=" inline-flex bg-purple-600 rounded-lg text-white  font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                @click="addComment = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                    <h1 class=" ml-2"> Add Comment</h1> 
                </button>
                <!-- Add comment model here -->
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

                            <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Place your Comment !</p>
                            @livewire('user-games3',['gameId' => $game['id']])
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="my-8 bg-gray-900 rounded-3xl p-16 space-y-6">
            @livewire('game-comments', ['gameId' => $game['id']])
        </div>

    </div>
</div>


@endsection