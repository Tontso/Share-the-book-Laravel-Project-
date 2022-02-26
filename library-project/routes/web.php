<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
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

Route::get('/book', [BookController::class, 'create'])->name('create-book');
Route::post('/book', [BookController::class, 'store'])->name('create-book');

Route::get('/books/{book}', [BookController::class, 'show'])->name('show-book');

Route::get('/book/{book}', [BookController::class, 'edit'])->name('edit-book');
Route::patch('/book/{book}', [BookController::class, 'update'])->name('edit-book');

Route::get('/{user}/books', [BookController::class, 'index'])->name('show-books');

Route::post('/books/{book}', [CommentController::class, 'store'])->name('add-comment');

require __DIR__ . '/auth.php';
