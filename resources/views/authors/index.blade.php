@extends('layout')

@section('content')
    <div>
        <div class=" border-2 p-2 my-2 rounded border-green-300">
            <h2 class="text-2xl md:text-3xl text-green-600 text-center">All Our Creative Writers</h2>
        </div>
       <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 space-y-2">
            @foreach ($authors as $author)
                <div>
                    <a href="{{ route('author.show', $author->id) }}" class="link text-xl">{{ $author->name }}</a>
                    <small>{{ count($author->books) }}</small>
                </div>
            @endforeach
       </div>
    </div>
@endsection