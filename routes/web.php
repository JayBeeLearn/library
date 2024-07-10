<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebBookController;
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
    return view('index');
});


Route::get('/register', [WebAuthController::class, 'register'])->name('register');
Route::get('/login', function(){
    return view('auth.login');
})->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::get('/register', [WebAuthController::class, 'register'])->name('register');
Route::post('/register', [WebAuthController::class, 'store']);
Route::delete('/', [WebAuthController::class, 'logout'])->name('logout');


Route::get('/books', [WebBookController::class, 'index'])->name('books');
Route::get('/add-new-book', [WebBookController::class, 'addNewBook'])
        ->name('addNewBook')->middleware('auth');
Route::post('/add-new-book', [WebBookController::class, 'store'])->name('book.store');


