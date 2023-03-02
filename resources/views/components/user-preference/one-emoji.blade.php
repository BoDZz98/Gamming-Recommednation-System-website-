@props([
    'type'=>'radio',
    'name','id','value','isActive','text','img'
    ])


<div @click.away.window="{{$isActive}} = false" class="flex">
    <input type="{{$type}}"  name="{{$name}}" id="{{$id}}" value="{{$value}}" class="hidden" ><!-- hidden -->
    <label for="{{$id}}" class=" group transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
    @click="{{$isActive}} = true" >
        <img src="/imgs/{{$img}}.png" class="w-10 h-10" :class="{{$isActive}} ? 'opacity-100 -translate-y-1 scale-110 transition ease-in-out duration-300' : ' opacity-50 hover:opacity-100' " >
        <p class="opacity-0 group-hover:opacity-100 text-white text-xs">{{$text}}</p>
    </label>
</div>

<!-- wire:model.lazy="rating1" -->