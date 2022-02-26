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
                @if ( Auth::user()->id != $user->id && !Auth::user()->follow->contains($user->id))
                <form action="{{route('follow',['user' => $user])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-button class="mt-4 ml-4">Follow
                    </x-button>
                </form>
                @else
                <form action="{{route('unfollow',['user'=>$user])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-button class="mt-4 ml-4">Unfollow
                    </x-button>
                </form>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Hello from {{$user->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>