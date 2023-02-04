@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
    @livewire('popular-games')
    <!-- Next section is recently reviewed and most anticpeted. -->
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewed w-full mr-0 lg:w-3/4 lg:mr-32">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
            @livewire('new-games')     
        </div>
        <div class="most-anticipated mt-12 lg:w-1/4 lg:mt-0">
            <h2 class="text-blue-500 uppercase  tracking-wide font-semibold">Most Anticipated</h2>

            @livewire('most-anticipated') 

            <h2 class="text-blue-500 uppercase mt-4 tracking-wide font-semibold">Comming Soon</h2>

            @livewire('comming-soon')
        </div>
    </div>
</div> 





@endsection