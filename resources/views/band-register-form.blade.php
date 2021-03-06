<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-3xl text-black leading-3">
            {{ __('Register a Band') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form enctype="multipart/form-data" action="/band" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf

                            <div class="flex flex-row place-content-center">
                                <div>
                                    <label for="name">Band</label>
                                </div>
                                <div>
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="flex flex-row place-content-center">
                                <div>
                                    <label for="year">Year Formed</label>
                                </div>
                                <div>
                                    <input type="text" name="year" id="year">
                                </div>
                            </div>
                            <div class="flex flex-row place-content-center">
                                <div>
                                    <select name="genre" id="genre" multiple>
                                        <option value=""selected>Select 1 or more genres</option>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="photo">
                                        <input type="file" name="photo" id="photo">
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit">Register band</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </x-slot>



</x-app-layout>
