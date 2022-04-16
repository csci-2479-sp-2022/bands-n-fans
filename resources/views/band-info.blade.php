<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$band->name }} {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <ol>
                    <li>Genres: </li>

                    @foreach ($band->genre as $genre)
                    <li>{{ $genre->name }}</li>
                    @endforeach
                    <li>Year formed: {{$band->year_formed }}</li>
                    <img src="{{$band->photo }}" alt="Photo of {{$band->name }}">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

