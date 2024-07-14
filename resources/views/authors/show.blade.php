@extends('layout')

@section('content')
    <div>
        <div class=" p-2 rounded-lg my-4  ">
           <div class="mb-4 ">
                <a href="{{ route('authors.index') }}" class="bg-green-500 text-white  px-4 py-2 rounded-l-xl sm:text-lg">Back to All Authors</a>
            </div>
           <div class="flex mb-4">
                <h2 class="text-2xl sm:text-3xl mx-auto font-bold text-blue-600">{{ $author->name }}</h2>
           </div>
            
        </div>
        
       <div>
        <p class="my-2">Email: <a href="mailto:{{ $author->email }}" class="link">{{ $author->email }}</a></p>
         <div class="space-y-4">
            @foreach ($author->books as $book)
                <div>
                    <p>
                        <a href="{{ route('book.show', $book->id) }}" class="link text-lg">{{ $book->title }}</a>
                    </p>
                </div>
            @endforeach
         </div>
       </div>
    </div>
@endsection