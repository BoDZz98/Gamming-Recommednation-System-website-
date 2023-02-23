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
        <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

        <!-- select2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- alpine js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        

        
    </head>
    <body class="font-sans text-gray-900 overflow-y-hidden">
        <!-- Background here -->
        <div class="overflow-hidden flex flex-col sm:justify-center items-center sm:pt-0 bg-center bg-contain  bg-[url('/public/imgs/background.jpg')]" 
        x-data="{ isLoginVisible: false, isRegisterVisible: false ,isUserModalVisible:false}"
        > 
            <div class="overflow-hidden w-screen h-screen bg-black bg-opacity-50 flex flex-col items-center">

                <div class="flex flex-col space-y-4 mt-40 bg-gray-400  rounded-xl p-10">
                    <img src="/imgs/logo.jpeg" alt="avatar" class="rounded-xl w-44 ">
                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 "
                    x-on:click.prevent="
                        isLoginVisible=true
                        isUserModalVisible=true

                    ">
                        Login
                    </button>

                    <button class="p-4 text-white font-semibold tracking-wide text-xl rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 "
                    x-on:click.prevent="
                        isRegisterVisible=true
                    ">
                        Sign up
                    </button>


                    <select class="tags bg-black rounded-lg w-32" id="tags" name="tags" >
                    </select>
                    
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
                        <div class="container mx-auto lg:px-32 rounded-2xl overflow-y-auto">
                            <div class="bg-gray-900 rounded-2xl">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        class="text-3xl leading-none text-gray-300 hover:text-gray-300"
                                        @click="isUserModalVisible = false"
                                        @keydown.escape.window="isUserModalVisible = false"
                                    >
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8 overflow-hidden relative" id="modal-body"
                                x-init="select2 = $($refs.select).select2({
                                    placeholder:'select',
                                    ajax:{
                                        url:' {{ route('games.get') }}',
                                    }
                                });">
                                    <p class="text-white">user preference model is here</p>
                                    <form action="" method="post">
                                        @csrf
                                        <!-- <select  x-ref="select" class=" bg-black rounded-lg w-32" >
                                           
                                        </select> -->
                                    </form>
                                </div>
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
                url:" {{ route('games.get') }}",
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
                                title:item.title
                            }
                        })
                    }
                }
            } 


    });
    })

        
</script>