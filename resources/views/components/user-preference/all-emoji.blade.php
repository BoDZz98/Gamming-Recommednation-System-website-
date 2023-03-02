@props([
    'name',
    'isActive','isActive2','isActive3','isActive4','isActive5',
    'id','id2','id3','id4','id5',
    ])

<div class="flex flex-row space-x-4 mt-4" x-data="{ {{$isActive}}: false , {{$isActive2}}: false , {{$isActive3}}: false , {{$isActive4}}: false , {{$isActive5}}: false}" > 
    <x-user-preference.one-emoji name='star'  isActive='{{$isActive}}'  value='1' id='{{$id}}'  text='Hated it' img='1'/>
    <x-user-preference.one-emoji name='star'  isActive='{{$isActive2}}' value='2' id='{{$id2}}'  text='Dislike it' img='2'/>
    <x-user-preference.one-emoji name='star'  isActive='{{$isActive3}}' value='3' id='{{$id3}}'  text="it's ok" img='3'/>
    <x-user-preference.one-emoji name='star'  isActive='{{$isActive4}}' value='4' id='{{$id4}}'  text="liked it" img='4'/>
    <x-user-preference.one-emoji name='star'  isActive='{{$isActive5}}' value='5' id='{{$id5}}'  text="loved it" img='5'/>
</div>