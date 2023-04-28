<div wire:init="loadComments" class="flex flex-col gap-y-5">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Comments</span>
    @if($commentCount!=0)
        @forelse($allComments as $oneComment)
            <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 lg:w-3/4">
                <div class="relative flex-none ">
                    <!-- Image -->
                    
                    <img  src="{{ asset($currentUserPhoto) }}" alt="user Cover" class="h-48 w-48 rounded-full">
                    
                </div>
                <!-- Game Name and details  / Right part -->
                <div class="ml-6 lg:ml-12">
                    <a href="#" class="block text-lg font-semibold leading-tight mt-4 hover:text-gray-400  ">{{$oneComment->userName}}</a>
                    <div class="flex flex-row space-x-4 mt-4 justify-center"> 
                        @foreach(range(0,4) as $any)
                            @if($loop->index+1==$oneComment->rating)
                                <div class="flex flex-col">
                                    <img src="/imgs/{{($loop->index+1)}}.png" class="w-10 h-10 opacity-100 -translate-y-1 scale-110">
                                    <p>{{$emojis[$loop->index]}}</p>
                                </div>
                            @else
                                <img src="/imgs/{{($loop->index+1)}}.png" class="w-10 h-10 opacity-50 " >
                            @endif
                        @endforeach
                    </div>
                    <p class="mt-6 text-gray-400 hidden lg:block "> {{$oneComment->desc}}</p>
                </div>
            </div>
        @empty
        <div class="flex gap-x-4">
            <span> loading comments </span> 
            <div
                class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                role="status">
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                    >Loading...</span
                >
            </div>
        </div>
        @endforelse
    @else
        No Comments On This Game Yet!
    @endif
</div>
