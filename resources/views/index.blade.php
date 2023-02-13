@extends('layouts.my_app')
@section('content')
<div class="container mx-auto px-4 ">
    <div class=" flex justify-center">
        <div class="bg-[url('https://via.placeholder.com/264x352')] w-3/4 h-72 rounded-2xl bg-gradient-to-r from-violet-500 to-fuchsia-500 p-16">
            <p class="text-lg font-bold font-mono">Welcome to gamer's Guide</p>
            <p class="text-3xl font-bold py-6"><span class="text-4xl font-extrabold">Browse</span> Our Popular <br>Games Now</p>
            <a href="" class="bg-gray-900 rounded-2xl p-3 transition ease-in-out duration-300 hover:bg-purple-900 text-sm">Browse Now</a>
        </div>
    </div>
    
    <div class="bg-gray-800 rounded-3xl p-8 mt-8">
        <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Recommended</span>
        <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
        @livewire('recommended-games')
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





@endsection