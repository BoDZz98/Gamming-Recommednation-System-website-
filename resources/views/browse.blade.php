@extends('layouts.app')
@section('content')

<div class="bg-gray-900 px-28 ">

    <div class="bg-gray-800  rounded-3xl p-8 flex flex-col space-y-8">
        <div class="flex flex-col xl:flex-row">
            <div class="recently-reviewed w-full h-fit mr-0 lg:basis-3/4 lg:mr-32 bg-gray-900 rounded-xl p-4 ">
                <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Popular</span>
                <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
                @livewire('popular-games')   
            </div>
            
            <div class="most-anticipated mt-12 lg:basis-2/6 lg:mt-0 bg-gray-900 rounded-xl p-10 h-fit">
                @livewire('most-anticipated') 
            </div>
        </div>
 
        <div class="bg-gray-900 rounded-xl p-4 w-full h-fit ">
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Different</span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Categories</span>
            @livewire('categories') 
            
        </div>
    </div>  
</div>

@endsection