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
<!--  -->
<div class="flex space-x-32">
    <div class="space-y-2">
        <x-input-label for="Game2" :value="__('Game (2)')" class="text-gray-400" />
        <select name="game2" x-ref="select2" class=" bg-black rounded-lg w-64 " > </select>
    </div>

    
    <div class="flex flex-row space-x-4 mt-4" x-data="{isActive21: false , isActive22: false , isActive23: false , isActive24: false , isActive25: false}" > 
        <div @click.away.window="isActive21 = false" class="flex">
            <input type="radio" name="star2" id="star1" value="1" class="hidden" ><!-- hidden -->
            <label for="star1" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            @click="isActive21 = true" >
                <img src="/imgs/1.png" class="w-10 h-10" :class="isActive21 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Hated it</p>
            </label>
        </div>

        <div @click.away.window="isActive22 = false" class="flex">
            <input type="radio" name="star2" id="star2" value="2" class="hidden" ><!-- hidden -->
            <label for="star2" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            @click="isActive22 = true" >
                <img src="/imgs/2.png" class="w-10 h-10" :class="isActive22 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                <p class="opacity-0 group-hover:opacity-100 text-white text-xs">Dislike it</p>
            </label>
        </div>

        <div @click.away.window="isActive23 = false" class="flex">
            <input type="radio" name="star2" id="star3" value="3" class="hidden" ><!-- hidden -->
            <label for="star3" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            @click="isActive23 = true" >
                <img src="/imgs/3.png" class="w-10 h-10" :class="isActive23 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                <p class="opacity-0 group-hover:opacity-100 text-white text-xs">it's ok</p>
            </label>
        </div>

        <div @click.away.window="isActive24 = false" class="flex">
            <input type="radio" name="star2" id="star4" value="4" class="hidden" ><!-- hidden -->
            <label for="star4" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            @click="isActive24 = true" >
                <img src="/imgs/4.png" class="w-10 h-10" :class="isActive24 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                <p class="opacity-0 group-hover:opacity-100 text-white text-xs">liked it</p>
            </label>
        </div>

        <div @click.away.window="isActive25 = false" class="flex">
            <input type="radio" name="star2" id="star5" value="5" class="hidden" ><!-- hidden -->
            <label for="star5" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            @click="isActive25 = true" >
                <img src="/imgs/5.png" class="w-10 h-10" :class="isActive25 ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
                <p class="opacity-0 group-hover:opacity-100 text-white text-xs">loved it</p>
            </label>
        </div>
        
    
        </div>
</div>
<!--  -->









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