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

<form method="POST" action="{{ route('login.authenticate') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="email" placeholder="Enter email" />
    <input type="password" name="password" placeholder="Enter password" />
    <input type="submit" value="Login" />
</form>

@endsection