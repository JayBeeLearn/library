<?php

namespace App\Http\Controllers\WEB;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QueryController extends Controller
{
    public function index(Request $request){
        $query = $request->get('query');

        if(!$query){
            return redirect()->route('books')->with('query', 'Search term required' );
        }

        $results = Book::with('user')
                    ->where('overview', 'LIKE', '%' . $query . '%')
                    ->orWhere('title', 'LIKE', '%' . $query . '%')
                    ->orWhere('genre', 'LIKE', '%' . $query . '%')
                    ->get(); 
                    
        $authors = User::with('books')
                    ->where('name', 'LIKE', '%' . $query . '%')->get(); 

        // dd($authors);

        return view('books.search', compact('results', 'authors', 'query'));

    }
}
