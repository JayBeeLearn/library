<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBookController extends Controller
{
     public function index(){

        return response()
            ->json(Book::with(['reviews', 'user'])->latest()->get());
    }

    public function show($id){

        return response()->json(Book::find($id));

    }

    public function store(Request $request){
         $request->validate([
            'title'=> 'required',
            'genre'=> 'required',
            'overview'=> 'required', 
            'premium', 
            'user_id'=>'required'
        ]);
        
        $premium = $request->get('premium')? 1:0;
            $newBook =  Book::create([
            'title'=> $request->get('title'), 
            'genre'=> $request->get('genre'), 
            'overview'=> $request->get('overview'), 
            'premium'=> $premium, 
            'user_id'=> $request->get('user_id'), 
        ]);

    return response()->json(['message'=>'Book added successfully', 'Book'=> $newBook]);
    }

    public function update(Request $request, $id){
        $Book = Book::findOrFail($id);
        $Book->update($request->all());

        return response()->json($Book);
    }

    public function destroy($id){
        Book::find($id)->delete();

        return 204;
    }
}
