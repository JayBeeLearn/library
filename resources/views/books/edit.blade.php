@extends('layout')


@section('content')
    <div>
        <h2>Updating {{ $book->title }}</h2>

        <div>
            <form action="{{ route('book.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
           <div>
                <label class="block" for="title">Title</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="text" 
                    name="title" id="title"
                    autocomplete="off" 
                    required  
                    value="{{ $book->title }}">
                    

                @error('title')
                {{ $message }} 
                @enderror
           </div>

            <div>
                <label class="block" for="genre">Genre</label>
                <input 
                    class="w-11/12 my-2 rounded-md p-2  border border-blue-300 " type="text" 
                    name="genre" id="genre"
                    autocomplete="off" 
                    required  
                    value="{{ $book->genre }}">

                @error('genre')
                {{ $message }} 
                @enderror
           </div>

       
        <div>
            <label class="block" for="overview">Overview</label>
            <textarea  class="w-11/12 my-2 rounded-md p-2  border border-blue-300"      name="overview" id="overview" cols="15" rows="4" required> {{ $book->overview }}
            </textarea>
    
            @error('overview')
            {{ $message }} 
            @enderror
        </div>
        
     
        <div>
            <input class="" type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        </div>

        <div>
            <label class="" for="premium" >Premium?</label>
            <input class="" type="checkbox" id="premium" name="premium" value="{{ $book->premium }}">
        </div>


        <div class="my-4">
            <input type="submit" value="Update" class="bg-blue-500 text-white px-4 py-2 font-bold rounded-md ">
        </div>
            
        </form>
        </div>
    </div>
@endsection