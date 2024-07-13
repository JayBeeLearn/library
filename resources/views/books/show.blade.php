@extends('layout')

@section('content')
    <div>
        <h2>{{ $book->title }}</h2>
        <h2>{{ $book->overview }}</h2>

        <a href="{{ route('book.edit', $book) }}" class="bg-yellow-700 p-2 ">Edit </a>

        <form action="{{ route('book.delete', $book) }}" method="POST">

            @csrf
            @method('DELETE')
            {{-- <input type="hidden" value="{{ auth()->user()->id }}"> --}}

            <input type="submit" class="bg-red-500 p-2 cursor-pointer hover:underline" value="Delete">
        </form>
    </div>
@endsection