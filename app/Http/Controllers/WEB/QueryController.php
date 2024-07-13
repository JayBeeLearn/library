<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index(Request $request){
        $query = $request->get('query');





        $results = Book::with('user')
                    ->where('overview', 'LIKE', '%' . $query . '%')
                    ->orWhere('title', 'LIKE', '%' . $query . '%')
                    ->orWhere('genre', 'LIKE', '%' . $query . '%')
                    ->get();

        return view('books.search', compact('results', 'query'));

    }
}
