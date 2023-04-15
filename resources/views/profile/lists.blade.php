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
                <div class=" flex flex-col items-center">
                    <form method="POST" class="w-1/2" action=" " enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col space-y-7">
                            <input type="text" class=" h-12 rounded px-3 bg-black" id="list_name" name="list_name"  placeholder="List Name"/>
                            @error('list_name')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                            <textarea type="text" class="w-full rounded p-3 bg-black h-20" id="list_description" name="list_description" value="{{ old('offer_ratio')}}" placeholder="List Description"></textarea>
                            @error('list_description')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button class="bg-white w-full rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="px-16 lg:px-40">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  mb-10 gap-12">
        <!-- one list -->
        <a href="" class="group w-52 h-72  transition ease-in-out duration-300">
            <div class="w-52 h-72  rounded-lg bg-purple-300 px-5  ">
                <button class="pl-32 pt-3  w-6 h-6 opacity-0 group-hover:opacity-100 transition ease-in-out duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="red" class="bi bi-trash w-10 h-10 bg-purple-700 rounded-full p-2" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
                <p class="text-lg font-semibold underline  pt-40">FAVORITE GAMES</p>
                <p class="text-s">Games: 12</p>
            </div>
        </a>

        <a href="" class="group w-52 h-72">
            <div class="w-52 h-72  rounded-lg bg-purple-300 px-5  ">
                <button class="pl-32 pt-3  w-6 h-6 opacity-0 group-hover:opacity-100 transition ease-in-out duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="red" class="bi bi-trash w-10 h-10 bg-purple-700 rounded-full p-2" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
                <p class="text-lg font-semibold underline  pt-40">FAVORITE GAMES</p>
                <p class="text-s">Games: 12</p>
            </div>
        </a>

        <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
            <p class="text-lg font-semibold underline">COLLECTIONS :</p>
            <p class="text-s">12</p>
        </div>

        <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
            <p class="text-lg font-semibold underline">COLLECTIONS :</p>
            <p class="text-s">12</p>
        </div>

        <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
            <p class="text-lg font-semibold underline">COLLECTIONS :</p>
            <p class="text-s">12</p>
        </div>

        <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
            <p class="text-lg font-semibold underline">COLLECTIONS :</p>
            <p class="text-s">12</p>
        </div>
    </div>
</div>





@endsection