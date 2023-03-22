@extends('layouts.app')

@section('content')

@foreach ($films as $film)
<div>
    <p>{{ $film->title }}</p>
    <p>{{ $film->rating }}</p>
</div>
@endforeach

@endsection