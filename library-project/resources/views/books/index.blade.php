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
                    <table class="table table-sm">
                        <thead class="border-b">
                            <tr>
                                <th class="px-4">Title </th>
                                <th class="px-4">Author </th>
                                <th class="px-4">Genre </th>
                                <th class="px-4">Edit </th>
                                <th>Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr class="border-b">
                                <td class="px-4 py-4"><a
                                        href="{{route('books.show', ['book' => $book])}}">{{$book->title}}</a></td>
                                <td class=" px-4">{{$book->author}}</td>
                                <td class="px-4">{{$book->genre->name}}</td>
                                <td class="px-4"><a href="{{ route('books.edit',['book' => $book]) }}">Edit</a></td>
                                <td class="px-4">Delete</td>
                            </tr>
                            @endforeach
                        </tbody>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>