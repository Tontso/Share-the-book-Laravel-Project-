<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 max-w-xl">

                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-label :value="__('Title')" />

                            <x-input class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                                autofocus />
                        </div>

                        <!-- Author -->
                        <div class="mt-4">
                            <x-label :value="__('Author')" />

                            <x-input class="block mt-1 w-full" type="text" name="author" :value="old('author')"
                                required />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label :value="__('Description')" />

                            <x-input class="block mt-1 w-full" type="text" name="description" required
                                autocomplete="new-password" />
                        </div>
                        <br>
                        <div>
                            <label for="genre_id">Choose a genre:</label>
                            <select name="genre_id">
                                @foreach ($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <hr>
                        <x-button class="mt-4 ml-4">POST
                        </x-button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>