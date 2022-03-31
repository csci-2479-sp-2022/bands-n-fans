<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bands') }}
        </h2>
    </x-slot>
    <x-slot name="slot">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6 mt-12 grid grid-cols-2 gap-6">
                @foreach($bands as $band)
                <div class="">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="grid grid-cols-2 gap-4">
                                  <div>Band/Artist:</div>
                                  <div>{{$band->name }}</div>
                                  <div>Genre:</div>
                                  <div>{{$band->genre}}</div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6">
                @foreach($bands as $band)
                <div class="mt-12">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-green-200">
                                <div class="grid grid-cols-2 gap-4">
                                  <div class="border-b-2 border-red-700">Band/Artist:</div>
                                  <div>{{$band->name }}</div>
                                  <div>Genre:</div>
                                  <div>{{$band->genre}}</div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>

</x-slot>

</x-app-layout>

