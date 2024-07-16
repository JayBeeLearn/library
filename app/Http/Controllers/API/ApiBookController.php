<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBookController extends Controller
{
    /**
     * Adds API Authentication to all the methods in this class.
     * 
     * Exception is made for the index and show methods which are not protected endpoints in the API
     *  
     */
     public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
     public function index(){

        return response()
            ->json(Book::with(['reviews', 'user'])->latest()->get());
    }

    /** 
     * Returns a single book that is filtered based on the ID
     * 
     * @var int
     * @return JSONResponse 
     * 
     */

    public function show($id){
        return response()->json(Book::find($id));
    }

    /**
     * Add a new book to the API database
     * 
     * @var array 
     * 
     * @return JSONRespone 
     */

    public function store(Request $request){
        dd($request->headers);
         $request->validate([
            'title'=> 'required',
            'genre'=> 'required',
            'overview'=> 'required', 
            'premium', 
            'user_id'=>'required'
        ]);
        
        // checks if the premium is set else it will automatically return false. 
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

    /**
     * Updates a book details using ID 
     * 
     * @var string<array>
     * @return JSONResponse   
     */

    public function update(Request $request, $id){
        $Book = Book::findOrFail($id);
        $Book->update($request->all());

        return response()->json($Book);
    }

    /**
     * Deletes a book based on ID
     * 
     * @var string<array>
     * @return JSONResponse   
     */

    public function destroy($id){
        Book::find($id)->delete();

        return 204;
    }
}
