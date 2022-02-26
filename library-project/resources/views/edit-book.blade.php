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
                    @if (Auth::id() == $book->user_id)
                    <form action="{{ route('edit-book',['book' => $book]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <strong> Title:</strong>
                        </div>
                        <div>
                            <input type="text" name="title" value="{{$book->title}}">
                        </div>
                        <div class="pt-5">
                            <strong> Author:</strong>
                        </div>
                        <div>
                            <input type="text" name="author" value="{{$book->author}}">
                        </div>
                        <div class="pt-5">
                            <strong> Description:</strong>
                        </div>
                        <div>
                            <input type="text" name="description" value="{{$book->description}}">
                        </div>
                        <div>
                            <select name="genre_id">
                                @foreach ($genres as $genre)
                                @if ($book->genre->id == $genre->id)
                                <option selected="selected" value="{{$book->genre->id}}">{{$book->genre->name}}</option>
                                @else
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button class="mt-4 ml-4">Save Changes</button>
                        </div>
                    </form>
                    @else
                    <h1>You have no permission to edit this book!!</h1>
                    @endif
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>