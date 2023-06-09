@extends('layouts.app')
@section('content')
    <h1>Contact Page</h1>
    @if (count($people))
    <ul>
        @for ($i = 0; $i < count($people); $i++)
            <li>{{ $people[$i] }}</li>
        @endfor
    </ul>
    @endif
@endsection