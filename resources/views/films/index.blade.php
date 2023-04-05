@extends('layouts.app')

@section('content')

<a href="{{ route('film.create') }}">Create film</a>

<hr />

<div class="row row-cols-4">
    @foreach ($films as $film)
        <div class="col">
            <img src="/storage/{{ $film->poster_path }}" width="250" height="250"/>
            <a href="{{ route('film.details', ['film' => $film]) }}"><p>{{ $film->title }}</p></a>
            <p>{{ $film->rating }}</p>
        </div>
    @endforeach
</div>

@endsection