@extends('layouts.settings')
@section('content3')

<div class="md:w-1/2 lg:w-1/4">
    <form method="POST" action=" " enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col space-y-7">
            <input type="text" class=" h-12 rounded px-3 bg-black" id="old_email" name="old_email"  placeholder="Old Email"/>
            @error('old_email')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="h-12 rounded px-3 bg-black" id="new_email" name="new_email" placeholder="New Email"/>
            @error('vertify_passwrod')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="h-12 rounded px-3 bg-black" id="password" name="password" placeholder="Password"/>
            @error('password')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <button class="bg-white w-full rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 
            
        </div>
        
        

    </form>
</div>
@endsection