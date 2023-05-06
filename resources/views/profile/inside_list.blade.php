@extends('layouts.my_app')
@section('content')

<div class="px-28" x-data="{ addComment:false }">
    <div class="bg-gray-800 rounded-3xl p-14">
        <div class="p-16 bg-gray-900 rounded-3xl  flex flex-col lg:flex-row">
            <div class="flex-none lg:w-1/5 lg:h-1/4 ">
                <img src="{{ $list['list_image_path'] }}" alt="game cover" class=" rounded-lg ">
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-80 flex flex-col space-y-8">
                <h2 class="fone-semibold text-4xl">{{$list['list_name']}}</h2>
                <h2 class="fone-semibold text-1xl">Games : {{$gameNumber}}</h2>
                <p class="mt-6 text-gray-400 hidden lg:block "> {{$list->list_description}}</p>
                
                <!-- Edit List model here -->
                <div 
                style="background-color: rgba(0, 0, 0, .5);" x-show="addComment"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto lg:px-80  overflow-y-auto">
                        <div class=" px-8 py-8 overflow-hidden relative bg-gray-900 rounded-2xl ">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    class="text-3xl leading-none text-white hover:text-gray-400"
                                    @click="addComment = false"
                                    @keydown.escape.window="addComment = false"
                                >
                                    &times;
                                </button>
                            </div>

                            <p class="font-extrabold text-4xl p-7  text-white flex justify-center self-center">Edit Your List</p>
                            @livewire('add-edit-list',['listId' => $list['list_id'],'functionName'=>'update'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 flex h-14">
                <a  class=" inline-flex bg-purple-600 rounded-lg text-white  font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                    @click="addComment = true">
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Edit_Pencil_01"> <path id="Vector" d="M12 8.00012L4 16.0001V20.0001L8 20.0001L16 12.0001M12 8.00012L14.8686 5.13146L14.8704 5.12976C15.2652 4.73488 15.463 4.53709 15.691 4.46301C15.8919 4.39775 16.1082 4.39775 16.3091 4.46301C16.5369 4.53704 16.7345 4.7346 17.1288 5.12892L18.8686 6.86872C19.2646 7.26474 19.4627 7.46284 19.5369 7.69117C19.6022 7.89201 19.6021 8.10835 19.5369 8.3092C19.4628 8.53736 19.265 8.73516 18.8695 9.13061L18.8686 9.13146L16 12.0001M12 8.00012L16 12.0001" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                    <p> Edit List</p> 
                </a> 
                <form action="{{ route('list.destroy',  $list['list_id'] ) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button  class=" inline-flex bg-red-600 rounded-lg text-white  font-semibold px-4 py-4 hover:bg-red-800 transition ease-in-out duration-150 ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="white" class="bi bi-trash w-8 h-8  rounded-full p-2" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        <h1> Delete List</h1> 
                    </button>
                </form>
                 
            </div>   
        </div>
        
        <div class="my-8 bg-gray-900 rounded-3xl p-16  ">
            <span class=" uppercase underline text-2xl tracking-wide font-extrabold">List </span>
            <span class=" tracking-wide font-extrabold text-2xl text-purple-600"> Games</span>
            @if(count($listGame) == 0)
                <h1 class=" uppercase text-2xl tracking-wide font-extrabold mt-10">No Games in this list </h1>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-12">
                @foreach($listGame as $game)
                    <div class="game mt-8 w-fit self-center lg:px-16">  
                        <div class="relative inline-block w-52">
                            <a href="{{ route( 'games.show',$game['slug'] ) }}">
                                <img src="{{ $game['coverImageUrl'] }}" alt="Game Cover" class=" h-60 rounded-lg w-44 hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            @if($game['rating'])
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: 20px; bottom: -15px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{ $game['rating'] }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a href="{{ route( 'games.show',$game['slug'] ) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 ">{{$game['name']}}</a>
                        <div class="text-gray-400 mt-1 "> 
                            {{ $game['platforms'] }}
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

    </div>
</div>


@endsection