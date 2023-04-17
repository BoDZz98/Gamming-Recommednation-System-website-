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
                @if(isset($game['involved_companies']))
                    <span class="text-gray-500">{{ $game['involved_companies'][0]['company']['name'] }}</span>
                @else
                    <span class="text-gray-500">Company Unknown</span> 
                @endif
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
                @if($isFav)
                    <a href="{{ route( 'games.removeGamefromFavorites',$game['id'] ) }}" class="px-3">
                        <svg fill="#ffffff" class="w-12 h-12"  viewBox="-6.08 -6.08 44.16 44.16" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00032" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.128"></g><g id="SVGRepo_iconCarrier"> <title>heart</title> <path d="M0.256 12.16q0.544 2.080 2.080 3.616l13.664 14.144 13.664-14.144q1.536-1.536 2.080-3.616t0-4.128-2.080-3.584-3.584-2.080-4.16 0-3.584 2.080l-2.336 2.816-2.336-2.816q-1.536-1.536-3.584-2.080t-4.128 0-3.616 2.080-2.080 3.584 0 4.128z"></path> </g></svg>                 
                    </a>     
                @else
                    <a href="{{ route( 'games.addGameToFavorites',$game['id'] ) }}" class="px-6 ">
                        <svg class="svg-icon-2" viewBox="0 0 20 20">
                            <path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"></path>
                        </svg> 
                    </a>
                @endif
                
                @if($isWishList)
                    <a href="{{ route( 'games.removeGamefromWishList',$game['id'] ) }}" class="px-6 ">
                        <svg class="w-12 h-12" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#F2F2F2;" d="M400.431,29.681H171.462c-13.151,0-23.851,10.699-23.851,23.851v366.774 c0,13.152,10.7,23.851,23.851,23.851h228.969c13.151,0,23.851-10.699,23.851-23.851V53.532 C424.282,40.38,413.582,29.681,400.431,29.681z"></path> <path style="fill:#CCCCCC;" d="M424.282,53.532c0-13.152-10.7-23.851-23.851-23.851H171.462c-13.151,0-23.851,10.699-23.851,23.851 v16.254h276.671V53.532z"></path> <path style="fill:#E5E5E5;" d="M147.611,69.786v350.521c0,13.152,10.7,23.851,23.851,23.851h228.969 c13.151,0,23.851-10.699,23.851-23.851V69.786H147.611z"></path> <g> <path style="fill:#b314c8;" d="M302.907,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95V7.95C310.857,3.56,307.299,0,302.907,0z"></path> <path style="fill:#b314c8;" d="M379.23,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95V7.95C387.18,3.56,383.622,0,379.23,0z"></path> <path style="fill:#b314c8;" d="M226.584,0h-33.921c-4.392,0-7.95,3.56-7.95,7.95v80.563c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95V7.95C234.534,3.56,230.976,0,226.584,0z"></path> </g> <g> <path style="fill:#b314c8;" d="M268.986,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563 c0,4.391,3.559,7.95,7.95,7.95h7.95C272.544,96.464,268.986,92.904,268.986,88.513z"></path> <path style="fill:#b314c8;" d="M345.309,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563 c0,4.391,3.559,7.95,7.95,7.95h7.95C348.867,96.464,345.309,92.904,345.309,88.513z"></path> <path style="fill:#b314c8;" d="M192.663,88.513V7.95c0-4.391,3.559-7.95,7.95-7.95h-7.95c-4.392,0-7.95,3.56-7.95,7.95v80.563 c0,4.391,3.559,7.95,7.95,7.95h7.95C196.221,96.464,192.663,92.904,192.663,88.513z"></path> </g> <g> <path style="fill:#b314c8;" d="M379.23,172.787H268.986c-4.392,0-7.95-3.56-7.95-7.95s3.559-7.95,7.95-7.95H379.23 c4.392,0,7.95,3.56,7.95,7.95S383.622,172.787,379.23,172.787z"></path> <path style="fill:#b314c8;" d="M379.23,257.59H268.986c-4.392,0-7.95-3.56-7.95-7.95s3.559-7.95,7.95-7.95H379.23 c4.392,0,7.95,3.56,7.95,7.95S383.622,257.59,379.23,257.59z"></path> <path style="fill:#b314c8;" d="M379.23,342.393H268.986c-4.392,0-7.95-3.56-7.95-7.95c0-4.391,3.559-7.95,7.95-7.95H379.23 c4.392,0,7.95,3.56,7.95,7.95C387.18,338.834,383.622,342.393,379.23,342.393z"></path> </g> <g> <path style="fill:#b314c8;" d="M226.584,189.747h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95 h33.921c4.392,0,7.95,3.56,7.95,7.95v33.921C234.534,186.188,230.976,189.747,226.584,189.747z M200.613,173.847h18.021v-18.021 h-18.021V173.847z"></path> <path style="fill:#b314c8;" d="M226.584,274.551h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95 h33.921c4.392,0,7.95,3.56,7.95,7.95V266.6C234.534,270.991,230.976,274.551,226.584,274.551z M200.613,258.65h18.021v-18.021 h-18.021V258.65z"></path> <path style="fill:#b314c8;" d="M226.584,359.354h-33.921c-4.392,0-7.95-3.56-7.95-7.95v-33.921c0-4.391,3.559-7.95,7.95-7.95 h33.921c4.392,0,7.95,3.56,7.95,7.95v33.921C234.534,355.794,230.976,359.354,226.584,359.354z M200.613,343.453h18.021v-18.021 h-18.021V343.453z"></path> </g> <path style="fill:#CCCCCC;" d="M424.282,420.306v-70.191c-8.168-3.762-16.895-5.719-25.798-5.719c-8.126,0-16.16,1.622-23.877,4.819 c-25.766,10.672-43.078,37.112-43.078,65.79c0,9.304,2.421,18.99,7.305,29.151h61.598 C413.582,444.157,424.282,433.458,424.282,420.306z"></path> <path style="fill:#b314c8;" d="M472.113,363.906c-15.867-6.572-32.889-4.05-46.771,6.614c-13.883-10.665-30.907-13.187-46.771-6.614 c-19.896,8.241-33.262,28.776-33.262,51.1c0,17.762,12.933,39.384,38.44,64.264c18.244,17.796,36.211,30.705,36.967,31.246 c1.383,0.99,3.005,1.484,4.626,1.484c1.621,0,3.244-0.495,4.626-1.484c0.756-0.541,18.722-13.45,36.967-31.246 c25.508-24.879,38.44-46.501,38.44-64.264C505.375,392.683,492.009,372.147,472.113,363.906z"></path> <path style="fill:#C42725;" d="M410.25,479.8c-25.508-24.88-38.44-46.502-38.44-64.264c0-22.323,13.366-42.86,33.262-51.1 c1.777-0.736,3.569-1.341,5.368-1.85c-10.297-3.376-21.337-3.044-31.869,1.32c-19.896,8.241-33.262,28.776-33.262,51.1 c0,17.762,12.933,39.384,38.44,64.264c18.244,17.796,36.211,30.705,36.967,31.246c1.383,0.99,3.005,1.484,4.626,1.484 c1.621,0,3.244-0.495,4.626-1.484c0.306-0.219,3.446-2.475,8.287-6.266C431.167,498.672,420.758,490.05,410.25,479.8z"></path> <circle style="fill:#b314c8;" cx="464.563" cy="409.706" r="15.901"></circle> <path style="fill:#333333;" d="M14.576,202.468c-4.392,0-7.95-3.56-7.95-7.95V62.012c0-13.152,10.7-23.851,23.851-23.851h18.021 c4.392,0,7.95,3.56,7.95,7.95s-3.559,7.95-7.95,7.95H30.476c-4.384,0-7.95,3.566-7.95,7.95v132.505 C22.526,198.908,18.967,202.468,14.576,202.468z"></path> <path style="fill:#458FDE;" d="M124.29,41.872C124.29,18.784,105.506,0,82.418,0S40.547,18.784,40.547,41.872v152.999h83.743V41.872 z"></path> <path style="fill:#b314c8;" d="M42.289,441.173l33.921,42.402c1.508,1.886,3.793,2.984,6.208,2.984s4.7-1.098,6.208-2.984 l33.921-42.402c1.127-1.41,1.743-3.161,1.743-4.966H40.547C40.547,438.012,41.161,439.763,42.289,441.173z"></path> <path style="fill:#4C4C4C;" d="M82.418,512c-4.392,0-7.95-3.56-7.95-7.95v-25.441c0-4.391,3.559-7.95,7.95-7.95s7.95,3.56,7.95,7.95 v25.441C90.369,508.44,86.81,512,82.418,512z"></path> <rect x="40.547" y="194.867" style="fill:#FFD652;" width="83.743" height="241.34"></rect> <path style="fill:#4F5AA8;" d="M98.054,3.04C93.219,1.087,87.944,0,82.418,0C59.331,0,40.547,18.784,40.547,41.872v152.999h31.271 V41.872C71.818,24.31,82.691,9.249,98.054,3.04z"></path> <rect x="40.547" y="194.867" style="fill:#b314c8;" width="31.271" height="241.34"></rect> <circle style="fill:#89DCFC;" cx="89.839" cy="36.571" r="11.66"></circle> </g></svg>                        
                    </a>
                @else
                    <a href="{{ route( 'games.addGameToWishList',$game['id'] ) }}" class="px-3">
                        {{-- <svg class="svg-icon-2" viewBox="0 0 20 20">
                            <path d="M15.396,2.292H4.604c-0.212,0-0.385,0.174-0.385,0.386v14.646c0,0.212,0.173,0.385,0.385,0.385h10.792c0.211,0,0.385-0.173,0.385-0.385V2.677C15.781,2.465,15.607,2.292,15.396,2.292 M15.01,16.938H4.99v-2.698h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.519,1.156-1.156s-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.321-1.089,0.771H4.99v-3.083h1.609c0.156,0.449,0.586,0.771,1.089,0.771c0.638,0,1.156-0.518,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V6.531h1.609C6.755,6.98,7.185,7.302,7.688,7.302c0.638,0,1.156-0.519,1.156-1.156c0-0.638-0.519-1.156-1.156-1.156c-0.503,0-0.933,0.322-1.089,0.771H4.99V3.062h10.02V16.938z M7.302,13.854c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386s-0.173,0.385-0.385,0.385S7.302,14.066,7.302,13.854 M7.302,10c0-0.212,0.173-0.385,0.385-0.385S8.073,9.788,8.073,10s-0.173,0.385-0.385,0.385S7.302,10.212,7.302,10 M7.302,6.146c0-0.212,0.173-0.386,0.385-0.386s0.385,0.174,0.385,0.386S7.899,6.531,7.688,6.531S7.302,6.358,7.302,6.146"></path>
                        </svg>  --}} 
                        <svg fill="#ffffff" class="w-12 h-12" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-102.4 -102.4 716.80 716.80" xml:space="preserve" stroke="#ffffff" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M378.965,156.886H268.721c-4.392,0-7.95,3.56-7.95,7.95s3.559,7.95,7.95,7.95h110.244c4.392,0,7.95-3.56,7.95-7.95 S383.357,156.886,378.965,156.886z"></path> </g> </g> <g> <g> <path d="M378.965,241.689H268.721c-4.392,0-7.95,3.56-7.95,7.95s3.559,7.95,7.95,7.95h110.244c4.392,0,7.95-3.56,7.95-7.95 S383.357,241.689,378.965,241.689z"></path> </g> </g> <g> <g> <path d="M378.965,326.493H268.721c-4.392,0-7.95,3.56-7.95,7.95s3.559,7.95,7.95,7.95h110.244c4.392,0,7.95-3.56,7.95-7.95 S383.357,326.493,378.965,326.493z"></path> </g> </g> <g> <g> <path d="M226.319,139.925h-33.921c-4.392,0-7.95,3.56-7.95,7.95v33.921c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95v-33.921C234.269,143.485,230.711,139.925,226.319,139.925z M218.369,173.847h-18.021v-18.021h18.021 V173.847z"></path> </g> </g> <g> <g> <path d="M226.319,224.729h-33.921c-4.392,0-7.95,3.56-7.95,7.95V266.6c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95v-33.921C234.269,228.288,230.711,224.729,226.319,224.729z M218.369,258.65h-18.021v-18.021h18.021 V258.65z"></path> </g> </g> <g> <g> <path d="M226.319,309.532h-33.921c-4.392,0-7.95,3.56-7.95,7.95v33.921c0,4.391,3.559,7.95,7.95,7.95h33.921 c4.392,0,7.95-3.56,7.95-7.95v-33.921C234.269,313.092,230.711,309.532,226.319,309.532z M218.369,343.453h-18.021v-18.021h18.021 V343.453z"></path> </g> </g> <g> <g> <g> <path d="M472.39,363.911c2.615,1.083,5.75,2.382,6.282,2.602c-0.369-0.153-2.154-0.892-6.294-2.607 c-2.485-1.029-3.531-1.462-3.66-1.516c0.134,0.056,1.75,0.725,3.652,1.512c-14.48-5.995-29.915-4.392-43.053,4.036V133.035 c0-4.391-3.559-7.95-7.95-7.95c-4.392,0-7.95,3.56-7.95,7.95v230.54c-11.934-4.706-25.074-4.328-37.111,1.463 c-18.668,8.982-30.732,28.596-30.732,49.968c0,4.189,0.751,8.624,2.188,13.25H165.896c-4.384,0-7.95-3.566-7.95-7.95V53.532 c0-4.384,3.566-7.95,7.95-7.95h18.551v42.932c0,4.391,3.559,7.95,7.95,7.95h33.921c4.392,0,7.95-3.56,7.95-7.95V45.582h26.501 v42.932c0,4.391,3.559,7.95,7.95,7.95h33.921c4.392,0,7.95-3.56,7.95-7.95V45.582h26.501v42.932c0,4.391,3.559,7.95,7.95,7.95 h33.921c4.392,0,7.95-3.56,7.95-7.95V45.582h18.551c4.384,0,7.95,3.566,7.95,7.95v34.981c0,4.391,3.559,7.95,7.95,7.95 c4.392,0,7.95-3.56,7.95-7.95V53.532c0-13.152-10.7-23.851-23.851-23.851h-18.551V7.95c0-4.391-3.559-7.95-7.95-7.95h-33.921 c-4.392,0-7.95,3.56-7.95,7.95v21.731h-26.501V7.95c0-4.391-3.559-7.95-7.95-7.95h-33.921c-4.392,0-7.95,3.56-7.95,7.95v21.731 h-26.501V7.95c0-4.391-3.559-7.95-7.95-7.95h-33.921c-4.392,0-7.95,3.56-7.95,7.95v21.731h-18.551 c-13.151,0-23.851,10.699-23.851,23.851v366.774c0,13.152,10.7,23.851,23.851,23.851h189.142 c19.612,32.974,63.983,64.956,65.942,66.358c3.084,1.98,6.168,1.98,9.253,0c0.756-0.541,18.722-13.45,36.967-31.246 c25.506-24.879,38.439-46.501,38.439-64.263C505.64,392.687,492.279,372.155,472.39,363.911z M352.994,37.631V15.901h18.021 v21.731v42.932h-18.021V37.631z M276.671,37.631V15.901h18.021v21.731v42.932h-18.021V37.631z M200.348,37.631V15.901h18.021 v21.731v42.932h-18.021V37.631z M425.637,494.146c-12.247-9.376-45.616-36.366-58.912-61.637c0-0.001-0.001-0.002-0.001-0.003 c-3.483-6.621-5.249-12.508-5.249-17.499c0-15.301,8.527-29.29,21.724-35.64c8.968-4.314,19.289-3.975,28.052,0.684 c4.637,2.465,8.838,8.866,14.354,8.985c5.056,0.109,8.498-5.457,12.518-7.753c8.921-5.096,18.337-6.758,28.17-2.686 c14.023,5.809,23.446,20.442,23.446,36.41C489.739,440.351,447.104,477.884,425.637,494.146z"></path> <path d="M468.718,362.39C468.705,362.385,468.701,362.383,468.718,362.39L468.718,362.39z"></path> <path d="M478.672,366.513C478.775,366.556,478.771,366.554,478.672,366.513L478.672,366.513z"></path> </g> </g> </g> <g> <g> <path d="M82.153,0C60.316,0,42.34,16.806,40.455,38.161H30.211C17.06,38.161,6.36,48.86,6.36,62.012v132.505 c0,4.391,3.559,7.95,7.95,7.95c4.392,0,7.95-3.56,7.95-7.95V62.012c0-4.384,3.566-7.95,7.95-7.95h10.07v140.455v89.044 c0,4.391,3.559,7.95,7.95,7.95c4.392,0,7.95-3.56,7.95-7.95v-81.093h51.942v225.789H56.182V323.843c0-4.391-3.559-7.95-7.95-7.95 c-4.392,0-7.95,3.56-7.95,7.95v112.364c0,1.805,0.615,3.556,1.743,4.966l32.179,40.224v22.652c0,4.391,3.559,7.95,7.95,7.95 c4.392,0,7.95-3.56,7.95-7.95v-22.652l32.179-40.224c1.127-1.41,1.743-3.161,1.743-4.966V194.518V41.872 C124.025,18.784,105.241,0,82.153,0z M82.153,465.882l-17.379-21.724h34.76L82.153,465.882z M108.124,186.567H56.182V41.872 c0-14.32,11.65-25.971,25.971-25.971s25.971,11.651,25.971,25.971V186.567z"></path> </g> </g> </g></svg>
                    </a>
                @endif

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
            @if(isset($game['summary']))
                <p class="mt-12"> {{$game['summary']}}</p>
            @else
                <p class="mt-12">No Summary Available For This Game </p>
            @endif
             
            <div class="mt-12 flex" x-data="{ isTrailerModalVisible:false }">
                @if(isset( $game['trailer']))
                    <button class="inline-flex bg-purple-600 rounded-lg text-white font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150"
                    @click="isTrailerModalVisible = true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                        <h1 class=" ml-2">Play Trailer</h1> 
                    </button>
                @endif
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
                {{-- Comments button --}}
                <a href="{{ route('comments.index',$game['id'] )}}" class="ml-4 inline-flex bg-purple-600 rounded-lg text-white font-semibold px-4 py-4 hover:bg-purple-800 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16"> <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/> </svg>
                    <h1 class=" ml-2">Comments</h1> 
                </a>
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
                            @if(count($userLists)!=0)
                                @foreach($userLists as $oneList)
                                <a href="{{ route('games.addGameToUserList',[$game['id'],$oneList->list_id] )}}">
                                    <li class="px-4 py-1 text-black hover:bg-gray-100 border b">{{ $oneList->list_name }}</li>
                                </a>
                                @endforeach
                            @else
                            <a href="{{route( 'profile.lists') }}">
                                <li class="px-4  py-1 text-black hover:bg-gray-100 border b text-sm">No Lists,Click here to Create One!</li>
                            </a>
                            @endif
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
             
            <div class="mt-12 flex gap-x-4">
                <div class="px-4 py-4 bg-gray-700 rounded-lg text-transparent">Button Here</div> 
                <div class="px-4 py-4 bg-gray-700 rounded-lg text-transparent">Button Here</div>
                <div class="px-4 py-4 bg-gray-700 rounded-lg text-transparent">Add To Collections </div>
            </div>
        </div>
       
    </div> 

    @endforelse
</div>
