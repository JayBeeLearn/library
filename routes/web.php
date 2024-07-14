<?php

use App\Http\Controllers\WEB\QueryController;
use App\Http\Controllers\WEB\WebAuthorController;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebBookController;
use App\Models\Book;
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

// Route::get('/', function () {
//     $books = Book::with('user')->latest()->get();
//     return view('index', compact('books'));
// });

Route::get('/', [WebBookController::class, 'index'])->name('books');

Route::get('/register', [WebAuthController::class, 'register'])->name('register');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::get('/register', [WebAuthController::class, 'register'])->name('register');
Route::post('/register', [WebAuthController::class, 'store']);
Route::delete('/user', [WebAuthController::class, 'logout'])->name('logout');


Route::get('/add-new-book', [WebBookController::class, 'addNewBook'])
        ->name('addNewBook')->middleware('auth');
Route::post('/add-new-book', [WebBookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [WebBookController::class, 'show'])->name('book.show');
Route::get('/books/{book}/edit', [WebBookController::class, 'edit'])->name('book.edit')->middleware('auth');
Route::put('/books/{book}/update', [WebBookController::class, 'update'])->name('book.update')->middleware('auth');
Route::delete('/books/{book}', [WebBookController::class, 'destroy'])->name('book.delete')->middleware('auth');


Route::get('/authors', [WebAuthorController::class, 'index'])->name('authors.index');
Route::get('/author/show/{id}', [WebAuthorController::class, 'show'])->name('author.show');
Route::put('/author/upgrade-account/{id}', [WebAuthorController::class, 'updateAccountToAuthor'])->name('updateAccountToAuthor')->middleware('auth');


Route::post('/query', [QueryController::class, 'index'])->name('query');
// Route::get('/query', [QueryController::class, 'index'])->name('query');