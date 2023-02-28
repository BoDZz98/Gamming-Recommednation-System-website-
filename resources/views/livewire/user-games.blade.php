<div >
    <form  method="post" wire:submit.prevent="submit"><!-- action="{{ route('register') }} "  -->
        @csrf
        <p class="  p-7 self-center text-white flex justify-center">{{$pages[$currentPage]}}</p>
        <div  >
        @if($currentPage===1)
            <div >
                <!-- Name -->
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
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                <div class="flex items-center justify-end mt-4">
                    

                    <!-- <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button> -->
                </div>
            </div>
       
        <!-- ------------------------------------------------------- -->
        <!-- <p class="  p-7 self-center text-white flex justify-center">{{$pages[$currentPage]}}</p>
         -->
         @elseif($currentPage===2)
        <!-- Games Div -->
        <div class=""  x-init="select2 = $([$refs.select,$refs.select2,$refs.select3,$refs.select4,$refs.select5]).select2({
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
           
            
                <div class="space-y-2" >
                    <x-input-label for="Game1" :value="__('Game (1)')" class="text-gray-400" />
                    <select wire:model.lazy="game1" name="game1" x-ref="select" class=" bg-black rounded-lg w-64 " > </select>
                </div>

                <!-- rating for 1 game -->
                <div class="flex flex-row space-x-4 mt-4" x-data="{isActive: false , isActive2: false , isActive3: false , isActive4: false , isActive5: false}" > 
                    <div @click.away.window="isActive = false" class="flex">
                        <input type="radio" wire:model.lazy="rating1" name="star" id="star1" value="1" class="hidden" ><!-- hidden -->
                        <label for="star1" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive = true" >
                            <img src="/imgs/1.png" class="w-10 h-10" :class="isActive ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Hated it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive2 = false" class="flex">
                        <input type="radio" wire:model.lazy="rating1" name="star" id="star2" value="2" class="hidden" ><!-- hidden -->
                        <label for="star2" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive2 = true" >
                            <img src="/imgs/2.png" class="w-10 h-10" :class="isActive2 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Dislike it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive3 = false" class="flex">
                        <input type="radio" wire:model.lazy="rating1" name="star" id="star3" value="3" class="hidden" ><!-- hidden -->
                        <label for="star3" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive3 = true" >
                            <img src="/imgs/3.png" class="w-10 h-10" :class="isActive3 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">it's ok</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive4 = false" class="flex">
                        <input type="radio" wire:model.lazy="rating1" name="star" id="star4" value="4" class="hidden" ><!-- hidden -->
                        <label for="star4" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive4 = true" >
                            <img src="/imgs/4.png" class="w-10 h-10" :class="isActive4 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">liked it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive5 = false" class="flex">
                        <input type="radio" wire:model.lazy="rating1" name="star" id="star5" value="5" class="hidden" ><!-- hidden -->
                        <label for="star5" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive5 = true" >
                            <img src="/imgs/5.png" class="w-10 h-10" :class="isActive5 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">loved it</p>
                        </label>
                    </div>
                </div>
            </div>
                <!-- -------------------------------------------------------------------- -->
            @elseif($currentPage===3)
                <div class="space-y-2">
                    <x-input-label for="Game2" :value="__('Game (2)')" class="text-gray-400" />
                    <select name="game2" x-ref="select2" class=" bg-black rounded-lg w-64 " > </select>
                </div>

                <div class="flex flex-row space-x-4 mt-4" x-data="{isActive21: false , isActive22: false , isActive23: false , isActive24: false , isActive25: false}" > 
                    <div @click.away.window="isActive21 = false" class="flex">
                        <input type="radio" name="star2" id="star21" value="1" class="hidden" ><!-- hidden -->
                        <label for="star21" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive21 = true" >
                            <img src="/imgs/1.png" class="w-10 h-10" :class="isActive21 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Hated it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive22 = false" class="flex">
                        <input type="radio" name="star2" id="star22" value="2" class="hidden" ><!-- hidden -->
                        <label for="star22" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive22 = true" >
                            <img src="/imgs/2.png" class="w-10 h-10" :class="isActive22 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Dislike it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive23 = false" class="flex">
                        <input type="radio" name="star2" id="star23" value="3" class="hidden" ><!-- hidden -->
                        <label for="star23" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive23 = true" >
                            <img src="/imgs/3.png" class="w-10 h-10" :class="isActive23 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">it's ok</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive24 = false" class="flex">
                        <input type="radio" name="star2" id="star24" value="4" class="hidden" ><!-- hidden -->
                        <label for="star24" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive24 = true" >
                            <img src="/imgs/4.png" class="w-10 h-10" :class="isActive24 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">liked it</p>
                        </label>
                    </div>

                    <div @click.away.window="isActive25 = false" class="flex">
                        <input type="radio" name="star2" id="star25" value="5" class="hidden" ><!-- hidden -->
                        <label for="star25" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                        @click="isActive25 = true" >
                            <img src="/imgs/5.png" class="w-10 h-10" :class="isActive25 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                            <p class="opacity-0 group-hover:opacity-100 text-white text-xs">loved it</p>
                        </label>
                    </div>
                </div>
            @endif



            <div class="flex items-center justify-between space-x-5 px-4 py-3 text-right sm:px-6">
                @if($currentPage===1)
                    <div></div>
                @else
                    <button wire:click="goToPreviousPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="button" >Back</button> 
                @endif
                @if($currentPage===count($pages))
                    <button class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="submit" >submit</button> 
                @else
                    <button wire:click="goToNextPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800  hover:text-white  transition ease-in-out duration-300" type="button" >Next</button> 
                @endif

            </div>

        


        </div>
    </form>

</div>


