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

<form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Enter name" />
    <input type="text" name="email" placeholder="Enter email" />
    <input type="password" name="password" placeholder="Enter password" />
    <input type="password" name="confirm_password" placeholder="Enter confirm password" />
    <input type="submit" value="Register" />
</form>

@endsection