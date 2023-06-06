@extends('layouts.app')

@section('content')

@if (Auth::user())
    <a href="{{ route('film.create') }}">Create film</a>
    <form method="POST" action="{{ route('logout') }}" enctype="multipart/form-data">
        @csrf
        <input type="submit" value="Logout" />
    </form>
@else 
    <p>Будь ласка авторизуйтеся</p>
    <a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('auth.register') }}" class="btn btn-primary">Register</a>
@endif

<hr />

<div class="row row-cols-4">
    @foreach ($films as $film)
        <div class="col">
            <img src="/storage/{{ $film->poster_path }}" width="250" height="250"/>
            <a href="{{ route('film.details', ['film' => $film]) }}"><p>{{ $film->title }}</p></a>
        </div>
    @endforeach
</div>

@endsection