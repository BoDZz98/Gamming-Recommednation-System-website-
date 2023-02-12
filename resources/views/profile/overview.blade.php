@extends('layouts.profile')
@section('content2')
<!-- overview  md:ml-16 lg:ml-20 xl:ml-40 gap-y-10  -->
<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Overview</p>
<div class="bg-red-500 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-5 px-7  mb-10">
    <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
        <p class="text-lg font-semibold underline">FAVORITE GAMES</p>
        <p class="text-s">Games: 12</p>
    </div>

    <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
        <p class="text-lg font-semibold underline">WISHLIST</p>
        <p class="text-s">Games: 12</p>
    </div>

    <div class="w-52 h-72  rounded-lg bg-purple-300 px-5 pt-52">
        <p class="text-lg font-semibold underline">COLLECTIONS :</p>
        <p class="text-s">12</p>
    </div>
</div>
<!-- recent comments -->
<div class="p-7 border-t-2 border-gray-800 space-y-7">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Recently</span>
    <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Commented</span>

    <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 ">
            <!-- Image and percentage container  / left part-->
        <div class="relative flex-none ">
            <!-- Image -->
            <a href="#">
                <img src="/imgs/shooter.jpg" alt="Game Cover" class="h-60 w-48 rounded-xl hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <!-- percentage -->
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                <div class="font-semibold text-xs flex justify-center items-center h-full">
                    80
                </div>
            </div>   
        </div>
        <!-- Game Name and details  / Right part -->
        <div class="ml-6 lg:ml-12">
            <a href="#" class="block text-lg font-semibold leading-tight mt-4 hover:text-gray-400  ">game name</a>
            <div class="text-gray-400 mt-1 "> 
                Stars
            </div>
            <p class="mt-6 text-gray-400 hidden lg:block "> Comment Deccription: </p>
            <p class=" text-white hidden lg:block "> Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quae laudantium, excepturi possimus deleniti culpa sint cum minus, laboriosam voluptas, vitae consequatur officiis ratione enim est consectetur saepe. Reprehenderit rem itaque natus id, alias ex. Et eos error nemo exercitationem. </p>
        </div>
    </div>
</div>
@endsection