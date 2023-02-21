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

    <!-- -------------------------------------------------------------------------------------------------------------------- -->


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