@extends('layouts.app')

@section('content')

<p>{{ $film->title }}</p>
<p>{{ $film->description }}</p>
<p>{{ $film->rating }}</p>

@endsection