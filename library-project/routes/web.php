<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/{user}/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::patch('/book/{book}', [BookController::class, 'update'])->name('books.update');

Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profiles.show');
Route::patch('/profile/{user}/follow', [UserProfileController::class, 'follow'])->name('follow');
Route::patch('/profile/{user}/unfollow', [UserProfileController::class, 'unfollow'])->name('unfollow');

require __DIR__ . '/auth.php';
