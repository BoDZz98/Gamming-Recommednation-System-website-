@extends('layouts.profile')
@section('content2')

<div></div>
<div class="flex justify-between px-14 py-10 " x-data="{ isAddModalVisible2:false }">

    <p class="text-2xl tracking-wide text-purple-500 font-extrabold ">Collections:</p>
    <a x-on:click.prevent="isAddModalVisible2=true" class=" lg:mt-0 ">
        <div class="flex flex-row p-2 bg-gray-700  rounded-xl hover:bg-purple-500 hover:text-white transition ease-in-out duration-300"> 
            <p class="mt-1 text-white font-semibold"> Add  </p>
            <svg class="svg-icon ml-3 " viewBox="0 0 20 20"> <path fill="none" d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z"></path> </svg>
        </div> 
    </a>

    <!-- Add model here -->
    <div 
    style="background-color: rgba(0, 0, 0, .5);" x-show="isAddModalVisible2"
    class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
    >
        <div class="container mx-auto lg:px-80  overflow-y-auto">
            <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl ">
                <div class="flex justify-end pr-4 pt-2">
                    <button
                        class="text-3xl leading-none text-white hover:text-gray-400"
                        @click="isAddModalVisible2 = false"
                        @keydown.escape.window="isAddModalVisible2 = false"
                    >
                        &times;
                    </button>
                </div>

                <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Add Your List</p>
                @livewire('add-edit-list',['functionName'=>'submit'])
            </div>
        </div>
    </div>

</div>

<div class="px-16 lg:px-40">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  mb-10 gap-12">
        @foreach ($userLists as $userList )
            <!-- one list -->
            <a href="{{ route( 'list.index',$userList['list_id'] ) }}" class=" w-52 h-72  transition ease-in-out duration-300">
                <div class="w-52 h-78  rounded-lg bg-gray-800 px-5 py-2 ">
                    <img src="{{ $userList->list_image_path  }}" alt="game cover" class=" h-60  w-48  hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
                    <p class="text-lg font-semibold underline">{{ $userList->list_name }}</p>
                    <p class="text-s">Games: {{ $gamesNumber[$loop->index] }}</p>
                </div>
            </a>
        @endforeach
        

        

        

        
    </div>
</div>





@endsection