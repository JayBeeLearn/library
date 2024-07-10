@extends('layout')

@section('content')
    <div>
        <h1 class="text-center text-xl font-bold text-blue-700 sm:text-2xl md:text-3xl">Login</h1>

    <div class="mx-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf
           

           <div>
                <label class="block" for="email">Email</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="email" 
                    name="email" id=""
                     
                    required  >
                @error('email')
                {{ $message }} 
                @enderror
           </div>

           <div>
                <label class="block" for="password">Password</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="password" 
                    name="password" id=""
                    autocomplete="off" 
                    required  >

                @error('password')
                {{ $message }} 
                @enderror
           </div>

            <input type="submit" value="Login" class="bg-blue-500 text-white px-4 py-2 font-bold rounded-md ">
            
        </form>

        <div>
            <p>Dont have an account? <a class="text-blue-400 hover:text-white hover:bg-blue-400 px-2 py-1 rounded" href="{{ route('register') }}">Register</a></p>
        </div>
      
    </div>
@endsection