<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Book $book){
        return view('review.create', compact('book'));
    }

    public function store(Request $request, Book $book){
        $validate = $request->validate([
            'user_id'=> 'required',
            'book_id'=> 'required',
            'review'=> 'required',
        ]); 

        Review::create($validate); 

        return redirect()->route('book.show', $book);
    }

    public function destroy($id){

        $review = Review::find( $id);
        $book = $review->book_id;

        $review->delete(); 
        return redirect()->route('book.show', $book);

    }
}
