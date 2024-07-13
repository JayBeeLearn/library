@extends('layout')

@section('content')
    <div>
        @foreach ($authors as $author)
            <div>
                <a href="{{ route('author.show', $author->id) }}" class="link">{{ $author->name }}</a>
            </div>
        @endforeach
    </div>
@endsection