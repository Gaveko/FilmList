@extends('layouts.app')

@section('content')

<div class="row row-cols-2">
    <div class="col">
        <img src="/storage/{{ $film->poster_path }}" width="250" height="500"/>
    </div>
    <div class="col">
        <h2>{{ $film->title }}</h2>
        <p>{{ $film->description }}</p>
        <p>Рейтинг - {{ $film->rating }}</p>
    </div>
</div>

@endsection