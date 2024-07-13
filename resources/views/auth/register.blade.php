@extends('layout')

@section('content')

<div>
        <h1 class="text-center text-xl font-bold text-blue-700 sm:text-2xl md:text-3xl">Register</h1>

    <div class="mx-4">
        <form action="" method="POST">
            @csrf
           <div>
                <label class="block" for="name">Name</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="text" 
                    name="name" id="name"
                    autocomplete="off" 
                    >
                @error('name')
                <small class="block text-red-500 mx-4">{{ $message }} </small>
                @enderror
           </div>

           <div>
                <label class="block" for="email">Email</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="email" 
                    name="email" id=""
                    required>
                @error('email')
                <small class="block text-red-500 mx-4">{{ $message }} </small>
                @enderror
           </div>

           <div>
               <label class="" for="author">Register as an Author?</label>
               <input class="" type="checkbox" id="author" name="author">
            </div>

           <div>
                <label class="block" for="password">Password</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="password" 
                    name="password" id="password"
                    autocomplete="off" 
                      >

                @error('password')
                <small class="block text-red-500 mx-4">{{ $message }} </small>
                @enderror
           </div>

           <div>
                <label class="block" for="password_confirmation">Confirm Password</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="password" 
                    name="password_confirmation" id="password_confirmation"
                    autocomplete="off" 
                    >
           </div>

            <input type="submit" value="Register" class="bg-blue-500 text-white px-4 py-2 font-bold rounded-md ">
            
        </form>
      
    </div>

    {{-- <div>
        <form action="{{ route('user.store') }}" method="POST">

            @csrf
       
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>


            <div>
                <button type="submit"> Register</button>
            </div>
        </form>
    </div> --}}
@endsection