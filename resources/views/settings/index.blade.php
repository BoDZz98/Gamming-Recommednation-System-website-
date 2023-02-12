@extends('layouts.settings')
@section('content3')
<div class="w-1/2"> 
    <span class=" text-gray-400 self-start">Avatar</span>

    <div class="flex flex-row py-4 space-x-5" >
        <img src="/imgs/avatar.png" alt="avatar" class="rounded-full w-12 "> 
        <a class="underline text-gray-400 mt-1" href="#">Upload</a>
    </div>
    <form method="POST" action=" " enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col md:space-y-5">

            <div class="flex flex-col md:space-y-4 lg:flex-row lg:space-x-4 lg:space-y-0">
                <input type="text" id="full_name" name="full_name" class=" lg:w-1/2 h-10 rounded px-3 bg-black" value="{{ old('product_id')}}" placeholder="Full Name"/>
                @error('full_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" class="lg:w-1/2 h-10 rounded px-3 bg-black" id="username" name="username" value="{{ old('offer_ratio')}}" placeholder="Username"/>
                @error('username')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        
            <div class="">
                <textarea type="text" class="w-full rounded p-3 bg-black h-36" id="bio" name="bio" value="{{ old('offer_ratio')}}" placeholder="Bio"></textarea>
                @error('bio')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            
        </div>
        
        <div class="mt-4 pt-2">
        <button class="bg-white w-full lg:w-1/3 rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 
        </div>

    </form>
</div>
@endsection