@extends('layouts.settings')
@section('content3')
<div class="w-1/2"> 
    <span class=" text-gray-400 self-start">Avatar</span>

    {{-- <div class="flex flex-row py-4 space-x-5" >
        <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-12 "> 
        <a class="underline text-gray-400 mt-1" href="#">Upload</a>
    </div> --}}
    
    
    @include('profile.partials.update-profile-information-form')
    
    
</div>
@endsection