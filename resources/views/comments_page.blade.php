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
                <h2 class="fone-semibold text-1xl">comments : {{$commentsNumber}}</h2>
                <button  class=" inline-flex bg-purple-600 rounded-lg text-white  font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                @click="addComment = true">
                    <svg class="svg-icon ml-3 " viewBox="0 0 20 20"> <path fill="none" d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z"></path> </svg>
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
            @livewire('game-comments', ['gameId' => $game['id'],'commentCount'=>$commentsNumber])
        </div>

    </div>
</div>


@endsection