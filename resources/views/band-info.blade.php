<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$band->name }} {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-purple-600 border-b border-gray-200">
                <ol>
                    <li>Genres: </li>

                    <li>{{implode(", ", ($band->genre()->pluck('name'))->toArray())}}</li>
                    <li>Year formed: {{$band->year_formed }}</li>
                    @if ($band->photo)
                        @if (str_contains($band->photo, 'public'))
                            <img src="{{$band->photo_url}} " alt="Photo of {{$band->name }}"/>
                        @else
                            <img src="{{$band->photo}} " alt="Photo of {{$band->name }}"/>
                        @endif
                    @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7EdlomtZmtYVX4JlPCJcdaDqszCOwnlZgTg&usqp=CAU"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

