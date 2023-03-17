<div wire:init="loadComments" class="flex flex-col gap-y-5">
    <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Comments</span>
    @forelse($allComments as $oneComment)
        <div class="gamecard bg-gray-800 rounded-xl shadow-md flex px-6 py-6 lg:w-3/4">
            <div class="relative flex-none ">
                <!-- Image -->
                <a href="#">
                    <img  alt="user Cover" class="h-60  w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
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
        loading
    @endforelse
</div>
