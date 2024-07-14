@extends('layout')

@section('content')
    <div>
        <div class=" p-2 rounded-lg my-4  ">
             <div class="mb-2">
                <a href="{{ route('book.show', $book->id) }}" class="bg-green-500 text-white  px-4 py-2 rounded-l-xl sm:text-lg">Cancel </a>
            </div>
           <div class="flex  ">
                <h2 class="text-xl sm:text-3xl mx-auto font-bold text-blue-600">{{ $book->title }}</h2>
           </div>
          
        </div >
        <div class="my-4">
            <p class="mb-6">{{ $book->overview }}</p>
            {{-- <a href="{{ route('review.create', $book) }}">Add Review</a> --}}
            {{-- <a href="{{ route('author.show', $book->user->id) }}" class="link">By {{ $book->user->name }}</a> --}}

            <form action="{{ route('review.store', $book) }}" method="POST">
                @csrf
                <input type="hidden"  name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <textarea name="review" id="review"  class="w-full p-2 outline-green-800 border-green-500 border-2 rounded-md" require ></textarea>

               @error('review')
                   <p class="text-red-500 mx-4 my-1">{{ $message }}</p>
               @enderror

                <button type="submit" class="bg-green-500 px-4 py-2 rounded-md text-white font-semibold">Submit Review</button>
            </form>

            
        </div>

        @if (count($book->reviews )>= 1)
            <div class="space-y-2">
                <p class="font-bold">Reviews</p>
                @foreach ($book->reviews as $review)
                    <div class="flex bg-green-100 rounded-md">
                        <p class="ml-4 px-4 py-2">{{ $review->review }}</p>

                    </div>
                @endforeach
            </div>
        @endif



        @auth
            @if (auth()->user()->id === $book->user->id)
                <div class="flex justify-between px-4 sm:w-2/3 md:w-1/2 mx-auto my-4">
                    <a 
                        href="{{ route('book.edit', $book) }}" 
                        class="bg-yellow-700 px-4 py-2 rounded-md text-white text-lg">
                        Edit
                    </a>

                    <form action="{{ route('book.delete', $book) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        {{-- <input type="hidden" value="{{ auth()->user()->id }}"> --}}

                        <input 
                            type="submit" 
                            class="bg-red-500 px-4 py-2 rounded-md text-white text-lg cursor-pointer hover:underline" value="Delete">
                    </form>
                </div>
            @endif
        @endauth
    </div>
@endsection