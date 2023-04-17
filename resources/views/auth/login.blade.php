<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       
        @vite('resources/css/main.css')
        <link rel="stylesheet" href="{{ asset( 'css/main.css' ) }}">
        <link rel="stylesheet" href="{{ url('css/app.css')}}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <!-- alpine js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        @livewireStyles

        <title>Gamer's Guide</title>
        
    </head>
    <body class="font-sans text-gray-900 overflow-y-hidden">
        <!-- Background here -->
        <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-center bg-contain  bg-[url('/public/imgs/background.jpg')] overflow-hidden "  
        x-data="{ isLoginVisible: false, isRegisterVisible: false ,isUserModalVisible:false ,isLoginVisible2:true,isRegisterVisible2: true}"
        > 
            <div class=" w-screen h-screen bg-black bg-opacity-50 flex flex-col items-center overflow-hidden" >

                <div class="flex flex-col space-y-4 mt-40 bg-gray-400  rounded-xl p-10" >
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ">
                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 "
                    x-on:click.prevent="
                        isLoginVisible=true
                        isRegisterVisible2=false 
                        {{-- isUserModalVisible=true --}}
                    ">
                        Login
                    </button>

                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg  bg-blue-500 hover:bg-indigo-500 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 "
                    x-on:click.prevent="
                        isRegisterVisible=true
                        isLoginVisible2=false 
                    ">
                        Sign up
                    </button>
                    
                </div>
           

            
                <!-- Login Div -->
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-400 shadow-md  sm:rounded-lg " x-show="isLoginVisible2"
                :class="isLoginVisible ? 'transition-transform duration-1000 -translate-y-[27rem] ' : 'translate-y-[50rem] ' " >
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
                            {{-- @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}
                            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" >
                                <span> Don't have an account? create one!</span>
                            </a>

                            <x-primary-button class="ml-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                <!-- Register Div-->
                <div class="w-full sm:max-w-md  px-6 py-4 bg-gray-400  sm:rounded-lg " x-show="isRegisterVisible2"
                :class="isRegisterVisible ? 'transition-transform duration-1000 -translate-y-[29rem] ' : 'translate-y-[55rem] ' " >
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ml-28 object-center">

                    {{-- @livewire('user-games')   --}}
                    <form  method="post"action="{{ route('register') }} ">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
        
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model.lazy="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
        
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
        
                            <x-text-input id="password" class="block mt-1 w-full"
                                            wire:model.lazy="pass"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
        
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
        
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password" wire:model.lazy="confirmPass"
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
            </div>

        </div>
        @livewireScripts
        <script src="/js/app.js"></script>
        <!-- <script src="/js/main.js"></script> -->
        <script src={{ url('js/main.js')}}></script>
        @stack('scripts')
        
    </body>
</html>


<script>
   

    $(document).ready(function(){

        $('#select').select2({
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

{{--  x-init="select2 = $([$refs.select,$refs.select2,$refs.select3,$refs.select4,$refs.select5]).select2({
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
                                });" --}}