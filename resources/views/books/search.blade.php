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

        @if (count($authors)>=1  || count($results) >= 1)
            <p>Your search for 
                <span class="font-bold">{{ $query }}</span> 
                returned 
                {{ count($results) >= 1 ? count($results) . ' results for Books': ''  }}  
                {{ count($results) && count($authors)? ' and ': '' }}
                {{ count($authors) >= 1 ? count($authors) . ' Authors' : '' }} </p>
        @else
            <p>No match found. Try again with a different search term.</p>
        @endif


        <div>
            <div class="my-4">
                <h2 class="text-xl font-bold">{{ count($results)>=1 ? 'Books': '' }}</h2>
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

            <div class="my-4">
                <h2 class="text-xl font-bold">{{ count($authors)>=1 ? 'Authors': '' }}</h2>
                @foreach ($authors as $author)
                    <p>
                        <a 
                            href="{{ route('author.show', $author->id) }}" 
                            class="link text-lg">
                            {{ $author->name }}
                        </a>
                    </p>
                @endforeach
            </div>

        </div>
    </div>
@endsection