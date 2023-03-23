@extends('layouts.app')

@section('content')

<a href="{{ route('film-index') }}">Home</a>

<hr />

<form method="POST" action="{{ route('film-create') }}">
    @csrf
    <input type="text" name="title" placeholder="Enter title"/>
    <input type="text" name="description" placeholder="Enter description"/>
    <input type="submit" value="Save" />
</form>

@endsection