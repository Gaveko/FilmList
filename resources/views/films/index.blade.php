@extends('layouts.app')

@section('content')

<a href="{{ route('film-create-form') }}">Create film</a>
<hr />

@foreach ($films as $film)
<div>
    <a href="{{ route('film-details', ['film' => $film]) }}"><p>{{ $film->title }}</p></a>
    <p>{{ $film->rating }}</p>
    <hr />
</div>
@endforeach

@endsection