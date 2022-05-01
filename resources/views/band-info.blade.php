<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-4xl text-purple-600 leading-3">
            {{$band->name }} {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-purple-600 rounded-lg">
                    <ol>
                        <li>Genres: </li>
                        <li>{{implode(", ", ($band->genre()->pluck('name'))->toArray())}}</li>
                        <li>Year formed: {{$band->year_formed }}</li>
                    </ol>
                </div>
                <div class="flex flex-col flex-shrink my-6">
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
                <div class="max-w-7xl">
                    <div class="fixed text-center inline-block align-text-bottom h-12 text-4xl rounded-lg bg-purple-500 max-w-7xl mx-auto bottom-0 left-0 right-0">
                        Bands & Fans website is home to {{count($bands)}} Bands!
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


