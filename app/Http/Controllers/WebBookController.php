<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WebBookController extends Controller
{
    public function index(){
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }
    public function addNewBook(){
        return view('books.create');
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'title'=> 'required',
            'genre'=> 'required',
            'overview'=> 'required', 
            'premium', 
            'user_id'=>'required'
        ]);
        
        $premium = $request->get('premium')? 1:0;
            Book::create([
            'title'=> $request->get('title'), 
            'genre'=> $request->get('genre'), 
            'overview'=> $request->get('overview'), 
            'premium'=> $premium, 
            'user_id'=> $request->get('user_id'), 
        ]);
    
        $books = Book::latest();

        return redirect()->route('books')->with('success', 'Book added succefully.');
    }
}
