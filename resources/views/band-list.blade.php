<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-3xl text-purple-600 leading-3">
            {{ __('Bands-n-Fans') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto flex flex-wrap gap-4 justify-around">
            @foreach($bands as $band)
                    {{-- this is the link to the bands info page --}}
            <a href="http://localhost/bands/{{$band->id}}">
                    <div  class=" h-24 w-96 m-2 rounded-lg bg-purple-500 hover:bg-purple-600 shadow-lg flex flex-row flex-nowrap">
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

</x-slot>

</x-app-layout>

