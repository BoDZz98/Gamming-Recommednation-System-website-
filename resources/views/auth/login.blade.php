<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @vite('resources/css/main.css')
        <title>Gamer's Guide</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])

        
        
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <!-- select2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- alpine js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        

        
    </head>
    <body class="font-sans text-gray-900 overflow-y-hidden">
        <!-- Background here -->
        <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-center bg-contain  bg-[url('/public/imgs/background.jpg')] overflow-hidden "  
        x-data="{ isLoginVisible: false, isRegisterVisible: false ,isUserModalVisible:false}"
        > 
            <div class=" w-screen h-screen bg-black bg-opacity-50 flex flex-col items-center overflow-hidden">

                <div class="flex flex-col space-y-4 mt-40 bg-gray-400  rounded-xl p-10">
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ">
                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 "
                    x-on:click.prevent="
                        isLoginVisible=true
                        isUserModalVisible=true

                    ">
                        Login
                    </button>

                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg  bg-blue-500 hover:bg-indigo-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 "
                    x-on:click.prevent="
                        isRegisterVisible=true
                    ">
                        Sign up
                    </button>
                    
                </div>
           

            
                <!-- Login Div -->
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-400 shadow-md  sm:rounded-lg "
                :class="isLoginVisible ? 'transition-transform duration-1000 -translate-y-[27rem] ' : 'translate-y-[45rem] ' " >
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ml-28 object-center">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ml-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- Register Div-->
                <div class="w-full sm:max-w-md  px-6 py-4 bg-gray-400  sm:rounded-lg "
                :class="isRegisterVisible ? 'transition-transform duration-1000 -translate-y-[50rem] ' : 'translate-y-[50rem] ' " >
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ml-28 object-center">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- user preference model here -->
                <template x-if="isUserModalVisible" >
                    <div 
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    >
                        <div class="container mx-auto lg:px-32  overflow-y-auto">
                                
                            <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl "
                            x-init="select2 = $([$refs.select,$refs.select2,$refs.select3,$refs.select4,$refs.select5]).select2({
                                placeholder:'select',
                                allowClear:true,
                                ajax:{
                                    url:' {{ route('games.getGames') }}',
                                    type:'post',
                                    delay:250,
                                    dataType:'json',
                                    data: function (params) {
                                    return{
                                        name: params.term,
                                    
                                        '_token':'{{ csrf_token() }}',
                                        };
                                    },

                                    processResults:function(data){
                                    return{
                                        results:$.map(data,function(item){
                                            return{
                                                id:item.id,
                                                text:item.name
                                            }
                                        })
                                    }
                                }

                                }
                                });">
                                <p class="font-extrabold text-4xl p-7 self-center text-white flex justify-center">Choose Your Favorite Games</p>
                                
                                <form action="{{ route('games.store') }}" method="post" class="flex flex-row space-x-28">
                                    @csrf
                                    <!-- Games Div -->
                                    <div class="flex flex-col space-y-8">
                                        <div class="flex space-x-32">
                                            <div class="space-y-2">
                                                <x-input-label for="Game1" :value="__('Game (1)')" class="text-gray-400" />
                                                <select name="game1" x-ref="select" class=" bg-black rounded-lg w-64 " > </select>
                                            </div>

                                            <!-- rating for 1 game -->
                                            <div class="flex flex-row space-x-4 mt-4" x-data="{isActive: false , isActive2: false , isActive3: false , isActive4: false , isActive5: false}" > 
                                                <div @click.away.window="isActive = false" class="flex">
                                                    <input type="radio" name="star" id="star1" value="1" class="hidden" ><!-- hidden -->
                                                    <label for="star1" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                                    @click="isActive = true" >
                                                        <img src="/imgs/1.png" class="w-10 h-10" :class="isActive ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                                                        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Hated it</p>
                                                    </label>
                                                </div>

                                                <div @click.away.window="isActive2 = false" class="flex">
                                                    <input type="radio" name="star" id="star2" value="2" class="hidden" ><!-- hidden -->
                                                    <label for="star2" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                                    @click="isActive2 = true" >
                                                        <img src="/imgs/2.png" class="w-10 h-10" :class="isActive2 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                                                        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Dislike it</p>
                                                    </label>
                                                </div>

                                                <div @click.away.window="isActive3 = false" class="flex">
                                                    <input type="radio" name="star" id="star3" value="3" class="hidden" ><!-- hidden -->
                                                    <label for="star3" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                                    @click="isActive3 = true" >
                                                        <img src="/imgs/3.png" class="w-10 h-10" :class="isActive3 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                                                        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">it's ok</p>
                                                    </label>
                                                </div>

                                                <div @click.away.window="isActive4 = false" class="flex">
                                                    <input type="radio" name="star" id="star4" value="4" class="hidden" ><!-- hidden -->
                                                    <label for="star4" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                                    @click="isActive4 = true" >
                                                        <img src="/imgs/4.png" class="w-10 h-10" :class="isActive4 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                                                        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">liked it</p>
                                                    </label>
                                                </div>

                                                <div @click.away.window="isActive5 = false" class="flex">
                                                    <input type="radio" name="star" id="star5" value="5" class="hidden" ><!-- hidden -->
                                                    <label for="star5" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                                    @click="isActive5 = true" >
                                                        <img src="/imgs/5.png" class="w-10 h-10" :class="isActive5 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                                                        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">loved it</p>
                                                    </label>
                                                </div>
                                                
                                            
                                                </div>
                                            </div>

                                        <div class="space-y-2">
                                            <x-input-label for="Game2" :value="__('Game (2)')" class="text-gray-400" />
                                            <select name="game2" x-ref="select2" class=" bg-black rounded-lg w-64 " > </select>
                                        </div>

                                        <div class="space-y-2">
                                            <x-input-label for="Game3" :value="__('Game (3)')" class="text-gray-400" />
                                            <select name="game3" x-ref="select3" class=" bg-black rounded-lg w-64 " > </select>
                                        </div>

                                        <div class="space-y-2">
                                            <x-input-label for="Game4" :value="__('Game (4)')" class="text-gray-400" />
                                            <select name="game4" x-ref="select4" class=" bg-black rounded-lg w-64 " > </select>
                                        </div>

                                        <div class="space-y-2">
                                            <x-input-label for="Game5" :value="__('Game (5)')" class="text-gray-400" />
                                            <select name="game5" x-ref="select5" class=" bg-black rounded-lg w-64 " > </select>
                                        </div>
                                    

                                        <button class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >submit</button> 

                                    </div>

                                

                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </template>

            </div>

        </div>
        
    </body>
    
   
   
    
</html>


<script>
    console.log('hi from login.blade.php')

    $(document).ready(function(){

        $('#tags').select2({
            placeholder:'select',
            ajax: {
                url:" {{ route('games.getGames') }}",
                type:"post",
                delay:250,
                dataType:'json',
                data: function (params) {
                return{
                    name: params.term,
                   
                    "_token":"{{ csrf_token() }}",
                    };
                },

                processResults:function(data){
                    return{
                        results:$.map(data,function(item){
                            return{
                                id:item.id,
                                text:item.name
                            }
                        })
                    }
                }
            } 


    });
    })

        
</script>