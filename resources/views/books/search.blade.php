@extends('layout')


@section('content')
    <div>

        <div class="container mt-2">
            @if ($message = Session::get('success'))
                <div class="alert rounded-lg inline-block text-red p-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

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