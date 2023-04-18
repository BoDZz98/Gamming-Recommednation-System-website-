<section>
    

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" enctype="multipart/form-data">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        {{ $user->photo }}
        <div class="flex flex-row py-2 space-x-5" >
            <img src="{{ asset($user->photo) }}" alt="avatar" class="rounded-full w-12 "> {{-- /imgs/avatar.png --}}
            <input type="file" name="userPhoto"class="underline text-gray-400 mt-1">
            {{-- <a class="underline text-gray-400 mt-1" href="#">Upload</a> --}}
        </div>
        
        <div class="flex flex-col md:space-y-4 lg:flex-row lg:space-x-4 lg:space-y-0 ">
            <div class="w-full lg:w-1/2">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 w-full h-10 rounded px-3 bg-black" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="w-full lg:w-1/2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 w-full h-10 rounded px-3 bg-black" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        
       
        <textarea type="text" class="w-full rounded p-3 bg-black h-36" id="bio" name="bio" value="123" placeholder="Bio">{{ $user->bio}}</textarea>
        @error('bio')
            <div class="text-sm text-red-500">
                {{ $message }}
            </div>
        @enderror

        
            <div class="mt-4 pt-2 flex flex-row space-x-3">
                <button class="bg-white w-full lg:w-1/3 rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="submit" >Save Changes</button> 
            
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        
    </form>
</section>
