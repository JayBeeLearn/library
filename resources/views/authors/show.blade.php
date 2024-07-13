@extends('layout')

@section('content')
    <div>
        <p>{{ $author->name }}</p>
        @foreach ($author->books as $book)
            <p>{{ $book->title }}</p>
        @endforeach
    </div>
@endsection