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
            main app
    </div>
@endsection