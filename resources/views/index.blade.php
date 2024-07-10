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
                    <small>{{ $book->genre }}</small>
                    <div class=" sm:min-h-28 flex justify-center items-center">
                        <h2 class="text-center text-3xl font-semibold">{{ $book->title }}</h2>
                    </div>
                    <div class="">
                        <h3 class="">Written by: {{ $book->user->name }}</h3>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection