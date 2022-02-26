<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Book $book)
    {

        request()->validate([
            'body' => ['required', 'string', 'max:255']
        ]);

        $comment = Comment::create([
            'body' => request()->body,
            'book_id' => $book->id,
            'user_id' => Auth::user()->id
        ]);
        $comment->save();
        return back();
    }
}
