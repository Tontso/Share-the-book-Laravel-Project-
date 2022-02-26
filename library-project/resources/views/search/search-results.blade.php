<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="topnav">
        <div class="search-container">
            <form action="{{route('search')}}" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1><b><u>Search Results</u></b></h1><br>
                    @if ($results->isEmpty())
                    <div>
                        <h1>No results!</h1>
                    </div>
                    @else
                    <ul>
                        @foreach ($results as $user)
                        <li class="border-b p-2"><a href="{{route('profile',['user' => $user])}}">{{$user->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>