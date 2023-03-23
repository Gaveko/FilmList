@extends('layouts.app')

@section('content')

<a href="{{ route('film-index') }}">Home</a>

<hr />

<p>{{ $film->title }}</p>
<p>{{ $film->description }}</p>
<p>{{ $film->rating }}</p>

@endsection