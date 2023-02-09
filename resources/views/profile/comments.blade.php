@extends('layouts.profile')
@section('content2')

<p class="text-2xl tracking-wide text-purple-500 font-extrabold p-7 ">Your Comments :</p>
<div class="px-10 py-6 space-y-8">
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
    <!-- second comment -->
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