@extends('admin.layout')
@section('title','Search Results')

@section('content')

@if ($matchingViews)
    <h2>Search results for "{{ $query }}"</h2>
    <ul>
        @foreach ($matchingViews as $view)
            <li><a href="{{ $view }}">{{ $view }}</a></li>
        @endforeach
    </ul>
@else
    <p>No results found for "{{ $query }}"</p>
@endif
@endsection