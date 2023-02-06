<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/main.css')
    <link rel="stylesheet" href="{{ asset( 'css/main.css' ) }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">

    @livewireStyles
    <title>Gamer's Guide</title>
</head>
<body class="bg-gray-900 text-white">
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
                    <li class="mt-6 lg:mt-2"> <a href="#" class="hover:text-gray-400">comming Soon</a></li> 
                    <li > <a href="{{route( 'profile.index') }}" class="mt-6 lg:mt-0 ">
                       <div class="flex flex-row p-2 bg-gray-700 text-gray-500 rounded-xl hover:bg-purple-500 hover:text-white transition ease-in-out duration-300"> profile <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-8 ml-3"> </div> 
                    </a></li> 
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
            @livewire('search-dropdown') 
                <div class="ml-6">
                    <a href="#"> <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-8"></a>
                </div>
            </div>
        </nav>
    </header> 
    
    <main class="py-8"> @yield('content')</main>

    <footer class="border-t border-gray-800"> 
        <div class="container mx-auto px-4 py-6">
            Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer> 
    @livewireScripts
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
    <script src={{ url('js/main.js')}}></script>
    @stack('scripts')
</body>
</html>