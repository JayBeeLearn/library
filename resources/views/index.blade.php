@extends('layout')

@section('content')
    <div>
        <div class="container mt-2">
            @if ($message = Session::get('success'))
                <div class="alert rounded-lg inline-block text-white bg-green-600 p-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div>
            <div class="block sm:grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-2">
            @foreach ($books as $book)
                <div class="flex flex-col justify-between py-2 px-4 bg-green-100 rounded my-4 sm:my-0">
                    <small > <span class="bg-green-200 py-1 px-2 rounded-lg inline"> {{ $book->genre }}</span></small>
                    <div class=" sm:min-h-28 flex justify-center items-center">
                        <a class="text-center text-3xl font-semibold link cursor-pointer" href="{{ route('book.show', $book) }}">{{ $book->title }}</a>
                    </div>
                    <div class="">
                        <h3 class="">Written by: <a href="{{ route('author.show', $book->user_id) }}" class="text-center text-xl font-semibold link cursor-pointer" >{{ $book->user->name }}</a></h3>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection