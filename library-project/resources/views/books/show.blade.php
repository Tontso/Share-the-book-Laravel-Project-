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
                    <h1> <strong> Title:</strong> {{$book->title}}</h1> <br>
                    <h1><strong>Author:</strong> {{$book->author}}</h1> <br>
                    <h1><strong>Description:</strong>{{$book->description}}</h1><br>
                    <h1><strong>Genre:</strong>{{$book->genre->name}}</h1><br>
                </div>
                <div>
                    @foreach ($book->comments as $comment)
                    <div>
                        <strong>{{$comment->user->name}} :</strong> {{$comment->body}}
                    </div>
                    @endforeach
                    <form action="{{ route('comments.store',['book' => $book]) }}" method="POST">
                        @csrf
                        Comment:<input type="text" name="body">
                        <button class="mt-4 ml-4">Comment</button>
                    </form>
                </div>
                @if (Auth::id() == $book->user_id)
                <form action="{{ route('books.edit',['book' => $book]) }}" method="GET">
                    <button class="mt-4 ml-4">Edit</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>