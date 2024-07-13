@extends('layout')

@section('content')
    <div>
        <div class="my-4">
            <h2 class="text-2xl sm:text-3xl text-green-700 text-center">{{ $author->name }}</h2>
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