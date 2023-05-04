@extends('layouts.my_app')
@section('content')
<div class="container mx-auto px-4 ">
    <div class=" flex justify-center">
        <div class="w-3/4 h-72 rounded-2xl flex flex-row justify-around bg-gradient-to-r from-violet-500 to-fuchsia-500 p-16">{{-- bg-[url('https://via.placeholder.com/264x352')]  --}}
            <div class="flex flex-col">
                <p class="text-lg font-bold font-mono">Welcome to gamer's Guide</p>
                <p class="text-3xl font-bold py-6"><span class="text-4xl font-extrabold">Browse</span> Our Popular <br>Games Now</p>
                <a href="{{route( 'games.browse') }}" class="w-32 bg-gray-900 rounded-2xl p-3 transition ease-in-out duration-300 hover:bg-purple-900 text-sm">Browse Now</a>
            </div>
            <div class="flex flex-col my-14">
                <p class="text-3xl font-bold "><span class="text-4xl font-extrabold">Complete</span> Rating Games </p>
                <p class="py-4 flex justify-center text-xl text-black font-bold">Games Rated: {{$total}}/10</p>
            </div>
        </div>
    </div>
    
    <div class="bg-gray-800 rounded-3xl p-14 mt-8">
        @if ($recGamesNumber==0)
        <div class=" w-full h-fit mr-0 lg:basis-3/4 lg:mr-32 bg-gray-900 rounded-xl px-20 pt-5">
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Popular</span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
            @livewire('popular-games')   
        </div>
        @else
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Recommended</span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
            @livewire('recommended-games')
        @endif
        
    </div>
    <!-- Next section is recently reviewed and most anticpeted. -->
    <div class="flex flex-col lg:flex-row my-10 ">
        <div class="recently-reviewed w-full mr-0 lg:w-3/4 lg:mr-32">
        <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Recently </span>
        <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Reviewed</span>
            @livewire('new-games')     
        </div>
        <div class="most-anticipated mt-12 lg:w-1/4 lg:mt-0">
            @livewire('comming-soon')
        </div>
    </div>
</div> 

{{-- User preference model //////////////////////////////////////////// --}}

<div x-data="{isUserModalVisible:{{$firstTime}}}">
    <div 
    style="background-color: rgba(0, 0, 0, .5);" x-show="isUserModalVisible"
    class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
    >
        <div class="container mx-auto lg:px-56  overflow-y-auto">
            <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl ">
                <div class="flex justify-end pr-4 pt-2">
                    <button
                        class="text-3xl leading-none text-white hover:text-gray-400"
                        @click="isUserModalVisible = false"
                        @keydown.escape.window="isUserModalVisible = false"
                    >
                        &times;
                    </button>
                </div>

                <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Choose Your Favorite Games</p>
                <div class="flex flex-col space-y-4">
                    @livewire('user-games')   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection