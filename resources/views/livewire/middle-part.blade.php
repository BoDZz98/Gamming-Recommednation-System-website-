<div wire:init="loadMiddlePart">
    <div class="images-container my-8 py-10 border-y-2 border-gray-800 "
        x-data="{ isImageModalVisible: false , image:''}">
        <span class=" uppercase underline text-2xl tracking-wide font-extrabold">Images</span>
        @forelse($middlePart as $game)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
            <!-- One Image -->
            @if(isset($game['screenshots']))
                @foreach($game['screenshots'] as $oneScreenshot)
                    <div >
                        <a href="#" 
                        @click.prevent="
                            isImageModalVisible=true
                            image='{{  $oneScreenshot['huge'] }}'
                        "
                        >
                            <img src="{{ $oneScreenshot['big'] }}" alt="screenshots" class="  rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div> 
                @endforeach
            @else
                No Images For This Game
            @endif
        </div>
        <!-- Images model here -->
        <template x-if="isImageModalVisible">
            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                class="text-3xl leading-none hover:text-gray-300"
                                @click="isImageModalVisible = false"
                                @keydown.escape.window="isImageModalVisible = false"
                            >
                                &times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </template>
        @empty
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 mt-8">
            <!-- One Image -->
            @foreach( range(1,6) as $oneScreenshot)
            <div class="h-64 rounded-lg bg-gray-600  ">
                
            </div> 
            @endforeach
        </div>

        @endforelse
    </div> 
</div>
