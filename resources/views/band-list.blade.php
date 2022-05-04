<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-purple-600 leading-3">
            {{ __('Bands-n-Fans') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto flex flex-wrap gap-4 justify-around">
            @foreach($bands as $band)
                    {{-- this is the link to the bands info page --}}
            <a href="http://localhost/bands/{{$band->id}}">
                    <div  class=" h-28 w-96 m-2 rounded-lg bg-purple-500 hover:bg-purple-600 shadow-lg flex flex-row flex-nowrap">
                            <div class=" basis-1/4">
                                @if ($band->photo)
                                    @if (str_contains($band->photo, 'public'))
                                        {{-- this is the photo uploaded by the user which is contained in the 'public/' directory --}}
                                        <img src="{{$band->photo_url}} " alt="Photo of {{$band->name }}" class="rounded-full h-24"/>
                                    @else
                                        {{-- this is a photo in the databas that contains a http url instead of being in the 'public/' directory --}}
                                        <img src="{{$band->photo}}" alt="Photo of {{$band->name }}" class="rounded-full h-24"/>
                                    @endif
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7EdlomtZmtYVX4JlPCJcdaDqszCOwnlZgTg&usqp=CAU" class="rounded-full h-24"/>
                                @endif
                            </div>
                            <div class="m-2 truncate px-2 basis-3/4">
                                <div class="font-bold">
                                    <div class="text-2xl flex flex-row">
                                        <div> 
                                        {{-- the name of the band --}}
                                        {{$band->name }}
                                        </div>
                                        
                                    

                                    </div>
                                    <div class="text-lg">
                                        {{-- this displays a list of genres that the band falls under --}}
                                        {{implode(", ", ($band->genre()->pluck('name'))->toArray())}}
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="w-auto text-left text-sm basis-3/4">
                                            {{-- this displays the number of fans that the band has --}}
                                            {{count($band->fan)}} Fans
                                     
                                        </div>
                                        <div class="content-end basis-1/4">
                                            @if (in_array(Auth::user()->id,$band->fan->pluck('id')->toArray()))
                                            <form action="{{ route('unlike.band', $band->id) }}"
                                            method="post">
                                            @csrf
                                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span class="relative px-3 py-0.2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Unlike
                                            </span>
                                            </button>   
                                            @else
                                            <form action="{{ route('like.band', $band->id) }}"
                                            method="post">
                                            @csrf
                                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span class="relative px-3 py-0.2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Like
                                            </span>
                                            </button>
                                            @endif
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                    </div>
            </a>
            @endforeach

        </div>
        </div>
            <div class="fixed text-center inline-block align-text-bottom h-12 text-4xl rounded-lg bg-purple-500 max-w-7xl mx-auto bottom-0 left-0 right-0">
              Bands & Fans website is home to {{count($bands)}} Bands!
            </div>
        

</x-slot>

</x-app-layout>

