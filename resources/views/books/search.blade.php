@extends('layout')


@section('content')
    <div>
        @if (count($results)>1)
            <p>Your search for <span class="font-bold">{{ $query }}</span> returned {{ count($results) }} results </p>
        @else
            <p>No match found. Try again with a different search term.</p>
        @endif


        <div>
            @foreach ($results as $result)
                <p>
                    <a 
                        href="{{ route('book.show', $result->id) }}" 
                        class="link text-lg">
                        {{ $result->title }}
                    </a>
                </p>
            @endforeach
        </div>
    </div>
@endsection