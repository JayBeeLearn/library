<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WebAuthorController extends Controller
{
    public function index(){
        $authors = User::all()->where('author', '=', true);

        // dd($authors);

        return view('authors.index', compact('authors'));
    }

    public function show($id){
        $author = User::with('books')->find($id);

        return view('authors.show', compact('author'));
    }


    public function updateAccountToAuthor($id){

        // dd($id);
        $author = User::findOrFail($id);
        
        $author->update([
            'author' => true 
        ]);
        // dd(User::find($id));


        return redirect()->route('addNewBook');
    }
}
