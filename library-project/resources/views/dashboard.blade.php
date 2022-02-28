<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="topnav">
        <div class="search-container">
            <form action="{{route('search.index')}}" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">

                    {{-- Following --}}
                    <table class="table table-sm">
                        <thead>
                            <tr class=" border-b">
                                <th class="px-4 border-b">Follow</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->follow as $followee)
                            <tr>
                                <td class="px-4">{{$followee->name}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{-- Followers --}}
                    <table class="table table-sm">
                        <thead>
                            <tr class="border-b">
                                <th class="px-6 border-l-4 border-gray-400">Followers </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->followers as $follower)
                            <tr>
                                <td class="px-6 border-l-4 border-gray-400">{{$follower->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>