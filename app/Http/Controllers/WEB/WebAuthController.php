<?php

namespace App\Http\Controllers\WEB;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class WebAuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]); 

        $author = request('author') ?1 : 0;

        User::create([
            'name'=> request('name'),
            'author' => $author,
            'email'=> request('email'),
            'password'=> Hash::make(request('password'),),
        ]);

        auth('web')->attempt($request->only(['email', 'password']));

        // later change where this redirect will go after registering a new user
        return redirect()->intended('/')->with('success', 'User Created successfully');
    }

    public function login(){
        $credentials = request(['email', 'password']);

        if(!auth('web')->attempt($credentials)){
            return redirect()->route('login')->with('message', 'Invalid details, try again');
        }
        
         // later change where this redirect will go after registering a new user
        return redirect()->intended('/')->with('success', 'User Logged In successfully');
    }

    public function logout(){

        auth('web')->logout();

        return redirect('/');
    }
}
