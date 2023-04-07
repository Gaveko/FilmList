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

@if (Auth::user())
    <div class="row">
        <form method="POST" action="{{ route('review') }}" enctype="multipart/form-data">
            @csrf
            <textarea name="body" type="text"></textarea>
            <input name="film_id" type="hidden" value="{{ $film->id }}"/>
            <input type="submit" value="Comment"/>
        </form>
    </div>
@endif

@foreach ($film->reviews as $review)
    <div class="row d-flex">
        <p>{{ $review->created_at }}</p>
        <p>{{ $review->body }}</p>
        <p>{{ $review->user->name }}</p>
    </div>
@endforeach


@endsection