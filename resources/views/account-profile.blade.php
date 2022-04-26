<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-purple-600 leading-3">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" text-center text-2xl text-purple-600 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
                <!-- <div class="p-6 bg-white border-b border-gray-200"> -->
                   
                    <p>
                    {{ Auth::user()->name }} would you like to <a class="text-blue-600" href="{{route('bandregister')}}">register a band?</a>
                    <br>
                    <br>
                    These are the bands you are a fan of.
                    </p>
                    
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

        <div class="max-w-7xl mx-auto flex flex-wrap gap-4 justify-around">
            @foreach($bands as $band)
                    {{-- this is the link to the bands info page --}}
            <a href="http://localhost/bands/{{$band->id}}">
                    <div  class=" h-24 w-96 m-2 rounded-lg bg-purple-500 hover: e-600 shadow-lg flex flex-row flex-nowrap">
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
                                    <div class="text-2xl">
                                        {{-- the name of the band --}}
                                        {{$band->name }}
                                    </div>
                                    <div class="text-lg">
                                        {{-- this displays a list of genres that the band falls under --}}
                                        {{$band->genreList()}}
                                    </div>
                                    <div class="w-auto text-right text-sm">
                                        {{-- this displays the number of fans that the band has --}}
                                        {{count($band->fan)}} Fans
                                    </div>
                                </div>
                            </div>
                    </div>
            </a>
            @endforeach

        </div>
            <div class="fixed text-center inline-block align-text-bottom h-12 text-4xl rounded-lg bg-purple-500 max-w-7xl mx-auto bottom-0 left-0 right-0">
            {{ Auth::user()->name}}, you are a fan of {{count($bands)}} Bands!
            </div>

</x-app-layout>
