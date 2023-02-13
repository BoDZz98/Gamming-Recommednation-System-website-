@extends('layouts.my_app')
@section('content')

<div class="bg-gray-900 px-32 lg:px-56 flex flex-col items-center">
    <p class="text-4xl tracking-wide font-extrabold  "> Settings</p>
    <nav class=" flex  py-6 lg:flex-row ">
        <div class=" flex items-center lg:flex-row">
            <ul class="flex ml-0  space-x-8 ">
                <li class="mt-6 lg:mt-2"> <a href="{{route( 'settings.index') }}" class="hover:text-gray-400">Profile</a></li> 
                <li class="mt-6 lg:mt-2"> <a href="{{route( 'settings.email') }}" class="hover:text-gray-400">My Email</a></li>                     
                <li class="mt-6 lg:mt-2"> <a href="{{route( 'settings.password') }}" class="hover:text-gray-400">My Password</a></li>                     
            </ul>
        </div>
    </nav>
    <div class="border-b-4 border-gray-800 w-full mb-6"></div>
    @yield('content3')
</div>

@endsection