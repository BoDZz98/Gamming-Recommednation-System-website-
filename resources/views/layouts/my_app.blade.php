<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/main.css')
        <link rel="stylesheet" href="{{ asset( 'css/main.css' ) }}">
        <link rel="stylesheet" href="{{ url('css/app.css')}}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">

        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <!-- alpine js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>

        
        @livewireStyles
        <title>Gamer's Guide</title>
    </head>

    <body class="bg-gray-900 text-white"  x-data="{ isUserModalVisible2:false }">
        <header class="border-b border-gray-800">
            <nav class="container mx-auto flex items-center justify-between px-4 py-6 flex-col lg:flex-row">
                <div class="flex flex-col items-center lg:flex-row">
                    <a href="/" >
                        <!-- <img src="/settings.png" alt="logo" class="w-28 h-8 flex-none"> -->
                        <h2 class="text-purple-600 text-3xl font-extrabold font-sans"> Gamer's Guide</h2>
                    </a>
                    <ul class="flex ml-0 lg:ml-16 space-x-8 ">
                        <li class="mt-6 lg:mt-2"> <a href="{{route( 'games.index') }}" class=" hover:text-gray-400">Home</a></li>
                        <li class="mt-6 lg:mt-2"> <a href="{{route( 'games.browse') }}" class=" hover:text-gray-400">Browse</a></li>
                        <li class="mt-6 lg:mt-2"> <a href="{{route( 'games.recommendations') }}" class="hover:text-gray-400">Settings</a></li> {{-- settings.index --}}
                        <li class="mt-6 lg:mt-2"> <a href="#" x-on:click.prevent="isUserModalVisible2=true" class="hover:text-gray-400">Rating</a></li>
                        <li class="md:mt-4 lg:mt-0">
                            <a href="{{route( 'profile.index') }}" class="mt-6 lg:mt-0 ">
                                <div class="flex flex-row p-2 bg-gray-700 text-gray-500 rounded-xl hover:bg-purple-500 hover:text-white transition ease-in-out duration-300"> profile 
                                    @if (true){{-- isset($currentUserPhoto) --}}
                                        <div class="flex flex-row py-2 space-x-5" >
                                            <img src="{{ asset($currentUserPhoto) }}" alt="avatar" class="rounded-full w-12 "> 
                                        </div>
                                    @else
                                        <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-12 ">
                                    @endif
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- user preference model here -->
                <div
                style="background-color: rgba(0, 0, 0, .5);" x-show="isUserModalVisible2"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-80  overflow-y-auto">
                        <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl ">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    class="text-3xl leading-none text-white hover:text-gray-400"
                                    @click="isUserModalVisible2 = false"
                                    @keydown.escape.window="isUserModalVisible2 = false"
                                >
                                    &times;
                                </button>
                            </div>

                            <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Choose Your Favorite Games</p>
                            <div class="">
                                @livewire('user-games2')
                            </div>
                        </div>
                    </div>
                </div>
                <p>Games Rated {{$total}}/10</p>
                <div class="flex items-center mt-6 lg:mt-0">
                    @livewire('search-dropdown')
                    <!-- Logo dropdown -->
                    <div class="ml-6">
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                            <div @click="open = ! open">
                                @if (true){{-- isset($currentUserPhoto) --}}
                                    <div class="flex flex-row py-2 space-x-5" >
                                        <img src="{{ asset($currentUserPhoto) }}" alt="avatar" class="rounded-full w-12 "> 
                                    </div>
                                @else
                                    <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-12 ">
                                @endif
                            </div>
                        
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-50 mt-2 w-48 rounded-md shadow-lg"
                                    style="display: none;"
                                    @click="open = false">
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                    <x-dropdown-link :href="route('profile.index')"> <!-- route('profile.edit') -->
                                        {{ __('My Profile') }}
                                    </x-dropdown-link>
    
                                    <x-dropdown-link :href="route('settings.index')"> 
                                        {{ __('Settings') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
    
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-8">
            <div>
                @if(session()->has('errorMessage'))
                    <div class="bg-red-500 p-6 mx-28 my-4 rounded-lg text-center opacity-80" id="alert">
                        {{session()->get('errorMessage')}}
                    </div>
                @endif

                @if(session()->has('sucMessage'))
                    <div class="bg-green-500 p-6 mx-28 my-4 rounded-lg text-center opacity-80" id="alert">
                        {{session()->get('sucMessage')}}
                    </div>
                @endif
            </div>
            @yield('content')</main>
        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </footer>
        @livewireScripts
        <script src={{ url('js/main.js')}}></script>
        {{-- <script src="/js/app.js"></script>
        <script src="/js/main.js"></script>
        @stack('scripts') --}}


    </body>
</html>
