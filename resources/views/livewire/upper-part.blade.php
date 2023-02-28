<div wire:init="loadDetailsPart">
    @forelse($detailsPart as $game)
    <div class="game-details p-16 bg-gray-800 rounded-3xl border-b border-gray-800 flex flex-col lg:flex-row">
        
        <div class="flex-none ">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class=" rounded-lg ">
            <p class="mt-4 rounded p-3 bg-gray-900 text-white font-semibold">{{ $game['first_release_date'] }}</p>
        </div>
        
        <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-64">
            <h2 class="fone-semibold text-4xl">{{$game['name']}}</h2>
            <div class="text-grey-400">
                <span>{{$game['genres']}}</span>
                &middot;
                <span class="text-gray-500">{{ $game['involved_companies'][0]['company']['name'] }}</span>
                &middot;
                <span>{{ $game['platforms'] }}</span>
            </div>
            <div class="flex flex-wrap items-center mt-8 bg-gray-900 rounded-xl p-4">
                <!-- first circle -->
                <div class="flex items-center">    
                    <div class="w-16 h-16 bg-gray-800 rounded-full " id="memberRating" >
                        <div id="memberRating"></div>
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $game['rating'] }}
                        </div>
                      
                    </div>
                    <div class="ml-4 text-xs">Member <br> Score</div>
                
                </div>
                <!-- second circle -->
                <div class="flex items-center ml-12">
                    
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{ $game['aggregated_rating'] }}                       
                        </div>
                    </div>

                    <div class="ml-4 text-xs">Critic <br> Score</div>
                
                </div>
                <!--  Fav and Wishlist -->
                <div class="px-6 ">
                <a href=""><svg class="svg-icon-2" viewBox="0 0 20 20">
					            <path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"></path>
				            </svg> 
                </a>
                </div>

                <a href=""> <svg class="svg-icon-2" viewBox="0 0 20 20">
							<path d="M15.396,2.292H4.604c-0.212,0-0.385,0.174-0.385,0.386v14.646c0,0.212,0.173,0.385,0.385,0.385h10.792c0.211,0,0.385-0.173,0.385-0.385V2.677C15.781,2.465,15.607,2.292,15.396,2.292 M15.01,16.938H4.99v-2.698h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.519,1.156-1.156s-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.321-1.089,0.771H4.99v-3.083h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.518,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V6.531h1.609C6.755,6.98,7.185,7.302,7.688,7.302c0.638,0,1.156-0.519,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V3.062h10.02V16.938z M7.302,13.854c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386s-0.173,0.385-0.385,0.385S7.302,14.066,7.302,13.854 M7.302,10c0-0.212,0.173-0.385,0.385-0.385S8.073,9.788,8.073,10s-0.173,0.385-0.385,0.385S7.302,10.212,7.302,10 M7.302,6.146c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386S7.899,6.531,7.688,6.531S7.302,6.358,7.302,6.146"></path>
						</svg> 
                </a>

                <!-- Websites Icons -->
                <div class="flex items-center space-x-4 mt-4  lg:mt-0 lg:ml-12">
                    @if($game['social']['website'])
                        <a href="{{$game['social']['website']['url']}}"class="w-10 h-10 bg-gray-800 rounded-full flex justify-center items-center">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M10,2.531c-4.125,0-7.469,3.344-7.469,7.469c0,4.125,3.344,7.469,7.469,7.469c4.125,0,7.469-3.344,7.469-7.469C17.469,5.875,14.125,2.531,10,2.531 M10,3.776c1.48,0,2.84,0.519,3.908,1.384c-1.009,0.811-2.111,1.512-3.298,2.066C9.914,6.072,9.077,5.017,8.14,4.059C8.728,3.876,9.352,3.776,10,3.776 M6.903,4.606c0.962,0.93,1.82,1.969,2.53,3.112C7.707,8.364,5.849,8.734,3.902,8.75C4.264,6.976,5.382,5.481,6.903,4.606 M3.776,10c2.219,0,4.338-0.418,6.29-1.175c0.209,0.404,0.405,0.813,0.579,1.236c-2.147,0.805-3.953,2.294-5.177,4.195C4.421,13.143,3.776,11.648,3.776,10 M10,16.224c-1.337,0-2.572-0.426-3.586-1.143c1.079-1.748,2.709-3.119,4.659-3.853c0.483,1.488,0.755,3.071,0.784,4.714C11.271,16.125,10.646,16.224,10,16.224 M13.075,15.407c-0.072-1.577-0.342-3.103-0.806-4.542c0.673-0.154,1.369-0.243,2.087-0.243c0.621,0,1.22,0.085,1.807,0.203C15.902,12.791,14.728,14.465,13.075,15.407 M14.356,9.378c-0.868,0-1.708,0.116-2.515,0.313c-0.188-0.464-0.396-0.917-0.621-1.359c1.294-0.612,2.492-1.387,3.587-2.284c0.798,0.97,1.302,2.187,1.395,3.517C15.602,9.455,14.99,9.378,14.356,9.378"></path>
                            </svg>
                        </a>
                    @endif

                    @if($game['social']['facebook'])
                        <a href="{{$game['social']['facebook']['url']}}" class="w-10 h-10 bg-gray-800 rounded-full flex justify-center items-center">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path>
                            </svg>
                        </a>
                    @endif

                    @if($game['social']['twitter'])
                    <a href="{{$game['social']['twitter']['url']}}" class="w-10 h-10 bg-gray-800 rounded-full flex justify-center items-center">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266"></path>
						</svg>
                    </a>
                    @endif

                    @if($game['social']['instagram'])
                    <a href="{{$game['social']['instagram']['url']}}" class="w-10 h-10 bg-gray-800 rounded-full flex justify-center items-center">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M14.52,2.469H5.482c-1.664,0-3.013,1.349-3.013,3.013v9.038c0,1.662,1.349,3.012,3.013,3.012h9.038c1.662,0,3.012-1.35,3.012-3.012V5.482C17.531,3.818,16.182,2.469,14.52,2.469 M13.012,4.729h2.26v2.259h-2.26V4.729z M10,6.988c1.664,0,3.012,1.349,3.012,3.012c0,1.664-1.348,3.013-3.012,3.013c-1.664,0-3.012-1.349-3.012-3.013C6.988,8.336,8.336,6.988,10,6.988 M16.025,14.52c0,0.831-0.676,1.506-1.506,1.506H5.482c-0.831,0-1.507-0.675-1.507-1.506V9.247h1.583C5.516,9.494,5.482,9.743,5.482,10c0,2.497,2.023,4.52,4.518,4.52c2.494,0,4.52-2.022,4.52-4.52c0-0.257-0.035-0.506-0.076-0.753h1.582V14.52z"></path>
						</svg>
                    </a>
                    @endif

                </div>
            </div>

            <p class="mt-12"> {{$game['summary']}}</p>
             
            <div class="mt-12 flex" x-data="{ isTrailerModalVisible:false }">
                <button class="inline-flex bg-purple-600 rounded-lg text-white font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                @click="isTrailerModalVisible = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                    <h1 class=" ml-2">Play Trailer</h1> 
                </button>
                <!-- trailer model here  -->
                <template x-if="isTrailerModalVisible">
                    <div style="background-color: rgba(0, 0, 0, .5);" class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isTrailerModalVisible = false"
                                        @keydown.escape.window="isTrailerModalVisible = false"
                                        class="text-3xl leading-none hover:text-gray-300"
                                    >
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $game['trailer'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </template>
                <!-- Dropdown button -->
                <button class="ml-4 relative flex justify-center items-center bg-purple-600 hover:bg-purple-800 border font-semibold focus:outline-none shadow-lg text-white rounded-lg hover:ring ring-white group">
                    <p class="px-4 ">Add To Collections</p>
                    <span class="border-l p-2"> 
                        <svg class="svg-icon-2" viewBox="0 0 20 20">
							<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
						</svg>
                    </span>
                    <div class="absolute hidden group-hover:block top-full min-w-full w-max bg-white shadow-md  rounded-lg">
                        <ul class="text-left border rounded">
                            <li class="px-4 py-1 text-black hover:bg-gray-100 border b">Collection 1</li>
                            <li class="px-4 py-1 text-purple-500 hover:bg-gray-100 border b">Collection 2</li>
                        </ul>
                    </div>
                </button>

<!--                 <button wire:click="goToNextPage" class="bg-white w-full lg:w-1/2 rounded p-4 text-black text-lg font-semibold hover:bg-gray-400  transition ease-in-out duration-300" type="button" >Next</button> 
 -->
            </div>
        </div>
       
    </div> <!--  End game Details -->
    
    @empty
    <div class="game-details p-16 bg-gray-800 rounded-3xl border-b border-gray-800 flex flex-col lg:flex-row">
        
        <div class="flex-none ">
            <div class="w-56 h-72 rounded-lg bg-gray-600 "></div>
            <p class="mt-4 rounded p-3 bg-gray-900 text-transparent w-56">May 20 , 2001</p>
        </div>
        
        <div class="mt-10 lg:mt-0 lg:ml-12 lg:mr-64">
            <h2 class="text-transparent text-4xl bg-gray-900 py-2 px-8 rounded-lg w-full lg:w-fit">game Name goes here </h2>
            
            <div class=" mt-8 text-transparent bg-gray-900 rounded-xl p-4 w-full">           
                <h1> Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt! Lorem ipsum dolor sit amet consectetur adipisicing </h1>            
            </div>

            <div class="mt-8 space-y-4 hidden lg:block ">
                <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt! Lorem ipsum dolor sit amet consectetur theeee </span>
                <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt! Lorem ipsum dolor sit amet consectetur theeee</span>
                <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, deserunt! Lorem ipsum dolor sit amet consectetur theeee</span>
            </div>
             
            <div class="mt-12 flex">
                <div class="px-4 py-4 bg-gray-700 rounded-lg text-transparent">Button Here</div>
                <div class="px-4 py-4 ml-4 bg-gray-700 rounded-lg text-transparent">Add To Collections </div>
            </div>
        </div>
       
    </div> 

    @endforelse
</div>
