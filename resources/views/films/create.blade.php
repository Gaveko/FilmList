@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="title" placeholder="Enter title" value="{{ old('title') }}" />
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <input type="text" name="description" placeholder="Enter description" />
    <input type="file" name="poster" accept="image/png, image/jpeg" />
    <input type="submit" value="Save" />
</form>

@endsection