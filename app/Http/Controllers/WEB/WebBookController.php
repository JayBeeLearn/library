<?php

namespace App\Http\Controllers\WEB;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class WebBookController extends Controller
{
    public function index(){

        $request = Request::create('/api/books', 'GET');
        $response = Route::dispatch($request);

        
        $books = json_decode($response->getContent());
        // dd($books[0]->user_id);
        return view('index', compact('books'));


        $books = Book::with('reviews')->latest()->get();

        // dd($books);
        return view('index', compact('books'));
    }
    public function addNewBook(){
        return view('books.create');
    }

    public function store(Request $request){
        // dd($request->all());

        $newBook = $request->validate([
            'title'=> 'required',
            'genre'=> 'required',
            'overview'=> 'required', 
            'premium', 
            'user_id'=>'required'
        ]);
        
        // $premium = $request->get('premium')? 1:0;
        //     Book::create([
        //     'title'=> $request->get('title'), 
        //     'genre'=> $request->get('genre'), 
        //     'overview'=> $request->get('overview'), 
        //     'premium'=> $premium, 
        //     'user_id'=> $request->get('user_id'), 
        // ]);
        $webUser = auth()->user(); 

        $token = Auth::guard('api')->login($webUser);
        // dd($token);

        // $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/auth/books', $newBook);


        $request = Request::create('/api/auth/books', 'POST', $newBook);
        $request->headers->set('Authorization', 'Bearer'. $token);
        // dd($request->headers);
        $response = Route::dispatch($request);

        return redirect()->route('books')->with('success', 'Book added successfully.');
    }

    public function show(Book $book){
        return view('books.show', compact('book'));
    }

    public function edit(Book $book){
        return view('books.edit', compact('book'));
    }

    public function update(Book $book, Request $request){
        // $thisBook = $book;
        // dd($book);
        $book->update($request->all());

        return view('books.show', compact('book'));
    }

    public function destroy(Book $book){
        // dd($book);

        $book->delete();
        return redirect()->route('books')->with('danger', 'Book Deleted successfully');
        // return view('books.edit', compact('book'));
    }
}
