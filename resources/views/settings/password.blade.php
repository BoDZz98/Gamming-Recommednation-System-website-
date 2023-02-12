@extends('layouts.settings')
@section('content3')

<div class="w-1/2 xl:w-1/4">
    <form method="POST" action=" " enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col space-y-7">
            <input type="text" class=" h-12 rounded px-3 bg-black" id="new_passwrod" name="new_passwrod"  placeholder="Create New Password"/>
            @error('new_passwrod')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="h-12 rounded px-3 bg-black" id="vertify_passwrod" name="vertify_passwrod" placeholder="Vertify New Password"/>
            @error('vertify_passwrod')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="h-12 rounded px-3 bg-black" id="old_passwrod" name="old_passwrod" placeholder="Old Password"/>
            @error('old_passwrod')
                <div class="form-error">
                    {{ $message }}
                </div>
            @enderror

            <button class="bg-white w-full rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 

            <a href="" class="self-center underline text-sm">Forget Your Password?</a>
            
        </div>
    </form>
</div>
@endsection