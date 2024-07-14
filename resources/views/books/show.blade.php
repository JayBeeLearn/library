@extends('layout')

@section('content')
    <div>
        <div class=" p-2 rounded-lg my-4  ">
             <div class="mb-2">
                <a href="{{ route('books') }}" class="bg-green-500 text-white  px-4 py-2 rounded-l-xl sm:text-lg">Go Back </a>
            </div>
           <div class="flex  ">
                <h2 class="text-xl sm:text-3xl mx-auto font-bold text-blue-600">{{ $book->title }}</h2>
           </div>
          
        </div >
        <div class="my-4">
            <p class="mb-6">{{ $book->overview }}</p>
            <a href="{{ route('author.show', $book->user->id) }}" class="link">By {{ $book->user->name }}</a>
        </div>

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