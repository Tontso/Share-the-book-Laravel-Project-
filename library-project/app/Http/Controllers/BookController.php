<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BookController extends Controller
{

    public function create()
    {
        return view('book', ['genres' => Genre::all()]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'genre_id' => ['required', 'string']
        ]);


        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::user()->id
        ]);

        $book->save();
        return redirect('dashboard');
    }



    public function index(User $user)
    {
        return view('user-books', ['books' => $user->books]);
    }

    public function show(Book $book)
    {
        return view('show-book', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('edit-book', ['book' => $book, 'genres' => Genre::all()]);
    }

    public function update(Book $book)
    {
        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'genre_id' => ['required', 'string', Rule::exists('genres', 'id')]
        ]);
        $attributes['description'] = request()['description'];
        $book->update($attributes);
        return redirect(route('show-book', ['book' => $book]));
    }
}
