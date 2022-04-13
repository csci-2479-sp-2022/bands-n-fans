<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-3xl text-black leading-3">
            {{ __('Select a Band') }}
        </h2>
    </x-slot>
    <x-slot name="slot">

        <div class="max-w-7xl mx-auto flex flex-wrap gap-4 justify-around">
            @foreach($bands as $band)
            <a href="http://localhost/bands/{{$band->id}}">
                    <div  class=" h-24 w-96 m-2 rounded-lg overflow-auto bg-purple-500 hover:bg-purple-600 shadow-lg flex flex-row flex-nowrap">
                            <div class="bg-cover bg-[url({{$band->photo }})] rounded-full basis-1/4">

                            </div>
                            <div class="m-2 pl-6 basis-3/4">
                                <div class="font-bold">
                                    <div class="text-2xl">
                                        {{$band->name }}
                                    </div>
                                    <div class="truncate text-lg">
                                        {{$band->genre}}
                                    </div>
                                    <div class="text-sm text-right mr-6">
                                        (# of) Fans {{--This needs to contain a variable of the number of fans --}}
                                    </div>
                                </div>
                            </div>
                    </div>
            </a>
            @endforeach

        </div>

</x-slot>

</x-app-layout>

