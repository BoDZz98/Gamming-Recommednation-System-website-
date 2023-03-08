<div wire:init="loadPopularGames" x-data="{ isActive0:false,
    isActive1:false , isActive2:false , isActive3:false ,
    isActive4:false , isActive5:false , isActive6:false ,
    isActive7:false , isActive8:false , isActive9:false  }">
    <form  method="post" wire:submit.prevent="submit" >{{-- {{ route('register') }} --}}
        @csrf
        
        @if($currentPage===1)
            <p class="  p-7  text-gray-400 flex justify-center">{{$pages[$currentPage]}}</p>
            
            <div class="flex flex-row space-x-8 justify-center">
                @foreach($popularGames as $game)
                    @if( $loop->index >=0)
                        <div class="flex ">
                            <input type="radio"  name="game1" wire:model.lazy="game1" id={{$loop->index}} value="{{$game['id']}}" class="hidden" ><!-- hidden -->
                            <label for={{$loop->index}} class=" group transition ease-in-out delay-150 hover:-translate-y-4 hover:scale-150 duration-300"
                            @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false ,{{'isActive'.$loop->index}} = true" >
                                <img src="{{ $game['coverImageUrl'] }}" class="w-16 h-20 rounded" :class="{{'isActive'.$loop->index}} ? 'opacity-100 -translate-y-4 scale-150 transition ease-in-out duration-300' : ' opacity-50 group-hover:opacity-100' " >
                                <p class=" text-white text-xs w-16" :class="{{'isActive'.$loop->index}} ?'opacity-100 translate-y-4 scale-150 transition ease-in-out duration-300':'opacity-0 group-hover:opacity-100'">{{$game['name']}}</p>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- rating for 1 game -->
            <x-user-preference.all-emoji name='rating1' 
            isActive='isActive' isActive2='isActive2' isActive3='isActive3' isActive4='isActive4' isActive5='isActive5'
            id='star' id2='star2' id3='star3' id4='star4' id5='star5' />
            
        <!-- ------------------------------------------------------- -->
         
        @elseif($currentPage===2)
            <p class="  p-7  text-gray-400 flex justify-center">{{$pages[$currentPage]}}</p>
                
            <div class="flex flex-row space-x-8 justify-center">
                @foreach($popularGames as $game)
                    @if( $loop->index >=0)
                        <div class="flex ">
                            <input type="radio"  name="game2" wire:model.lazy="game2" id={{$loop->index}} value="{{$game['id']}}" class="hidden" ><!-- hidden -->
                            <label for={{$loop->index}} class=" group transition ease-in-out delay-150 hover:-translate-y-4 hover:scale-150 duration-300"
                            @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false ,{{'isActive'.$loop->index}} = true" >
                                <img src="{{ $game['coverImageUrl'] }}" class="w-16 h-20 rounded " :class="{{'isActive'.$loop->index}} ? 'opacity-100 -translate-y-4 scale-150 transition ease-in-out duration-300' : 'opacity-50 group-hover:opacity-100' " >
                                <p class=" text-white text-xs w-16" :class="{{'isActive'.$loop->index}} ?'opacity-100 translate-y-4 scale-150 transition ease-in-out duration-300':'opacity-0 group-hover:opacity-100'">{{$game['name']}}</p>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
            <x-user-preference.all-emoji name='rating2' 
            isActive='isActive' isActive2='isActive2' isActive3='isActive3' isActive4='isActive4' isActive5='isActive5'
            id='star' id2='star2' id3='star3' id4='star4' id5='star5' />

            
        <!-- -------------------------------------------------------------------- -->
        @elseif($currentPage===3)
            <p class="  p-7  text-gray-400 flex justify-center">{{$pages[$currentPage]}}</p>
            <div class="flex flex-row space-x-8 justify-center">
                @foreach($popularGames as $game)
                    @if( $loop->index >=0)
                        <div class="flex ">
                            <input type="radio"  name="game3" wire:model.lazy="game3" id={{$loop->index}} value="{{$game['id']}}" class="hidden" ><!-- hidden -->
                            <label for={{$loop->index}} class=" group transition ease-in-out delay-150 hover:-translate-y-4 hover:scale-150 duration-300"
                            @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false ,{{'isActive'.$loop->index}} = true" >
                                <img src="{{ $game['coverImageUrl'] }}" class="w-16 h-20 rounded" :class="{{'isActive'.$loop->index}} ? 'opacity-100 -translate-y-4 scale-150 transition ease-in-out duration-300' : ' opacity-50 group-hover:opacity-100' " >
                                <p class=" text-white text-xs w-16" :class="{{'isActive'.$loop->index}} ?'opacity-100 translate-y-4 scale-150 transition ease-in-out duration-300':'opacity-0 group-hover:opacity-100'">{{$game['name']}}</p>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- rating for 1 game -->
            <x-user-preference.all-emoji name='rating3' 
            isActive='isActive' isActive2='isActive2' isActive3='isActive3' isActive4='isActive4' isActive5='isActive5'
            id='star' id2='star2' id3='star3' id4='star4' id5='star5' />

         <!-- -------------------------------------------------------------------- -->
        @elseif($currentPage===4)
            <p class="  p-7  text-gray-400 flex justify-center">{{$pages[$currentPage]}}</p>
   
            <div class="flex flex-row space-x-8 justify-center">
                @foreach($popularGames as $game)
                    @if( $loop->index >=0)
                        <div class="flex ">
                            <input type="radio"  name="game4" wire:model.lazy="game4" id={{$loop->index}} value="{{$game['id']}}" class="hidden" ><!-- hidden -->
                            <label for={{$loop->index}} class=" group transition ease-in-out delay-150 hover:-translate-y-4 hover:scale-150 duration-300"
                            @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false ,{{'isActive'.$loop->index}} = true" >
                                <img src="{{ $game['coverImageUrl'] }}" class="w-16 h-20 rounded" :class="{{'isActive'.$loop->index}} ? 'opacity-100 -translate-y-4 scale-150 transition ease-in-out duration-300' : ' opacity-50 group-hover:opacity-100' " >
                                <p class=" text-white text-xs w-16" :class="{{'isActive'.$loop->index}} ?'opacity-100 translate-y-4 scale-150 transition ease-in-out duration-300':'opacity-0 group-hover:opacity-100'">{{$game['name']}}</p>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- rating for 1 game -->
            <x-user-preference.all-emoji name='rating4' 
            isActive='isActive' isActive2='isActive2' isActive3='isActive3' isActive4='isActive4' isActive5='isActive5'
            id='star' id2='star2' id3='star3' id4='star4' id5='star5' />
                

        <!-- -------------------------------------------------------------------- -->
        @elseif($currentPage===5)
            <p class="  p-7  text-gray-400 flex justify-center">{{$pages[$currentPage]}}</p>
   
            <div class="flex flex-row space-x-8 justify-center">
                @foreach($popularGames as $game)
                    @if( $loop->index >=0)
                        <div class="flex ">
                            <input type="radio"  name="game5" wire:model.lazy="game5" id={{$loop->index}} value="{{$game['id']}}" class="hidden" ><!-- hidden -->
                            <label for={{$loop->index}} class=" group transition ease-in-out delay-150 hover:-translate-y-4 hover:scale-150 duration-300"
                            @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false ,{{'isActive'.$loop->index}} = true" >
                                <img src="{{ $game['coverImageUrl'] }}" class="w-16 h-20 rounded" :class="{{'isActive'.$loop->index}} ? 'opacity-100 -translate-y-4 scale-150 transition ease-in-out duration-300' : ' opacity-50 group-hover:opacity-100' " >
                                <p class=" text-white text-xs w-16" :class="{{'isActive'.$loop->index}} ?'opacity-100 translate-y-4 scale-150 transition ease-in-out duration-300':'opacity-0 group-hover:opacity-100'">{{$game['name']}}</p>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- rating for 1 game -->
            <x-user-preference.all-emoji name='rating5' 
            isActive='isActive' isActive2='isActive2' isActive3='isActive3' isActive4='isActive4' isActive5='isActive5'
            id='star' id2='star2' id3='star3' id4='star4' id5='star5' />
                
        @endif



            <div class="flex items-center justify-between space-x-5 px-4 py-3 text-right sm:px-6">
                @if($currentPage===1)
                    <div></div>
                @else
                    <button 
                    @click= " 
                            isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                            isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                            isActive8=false , isActive9=false "
                    wire:click="goToPreviousPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="button" >Back</button> 
                @endif
                @if($currentPage===count($pages))
                    <button class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800 hover:text-white transition ease-in-out duration-300" type="submit" >submit</button> 
                @else
                    <button @click= " 
                    isActive0=false , isActive1=false , isActive2=false , isActive3=false ,
                    isActive4=false , isActive5=false , isActive6=false , isActive7=false , 
                    isActive8=false , isActive9=false "
                    wire:click="goToNextPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-800  hover:text-white  transition ease-in-out duration-300" type="button" >Next</button> 
                @endif

            </div>

        


        
    </form>

</div>


