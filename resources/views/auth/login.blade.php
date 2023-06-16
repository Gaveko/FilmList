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

<div class="d-flex mb-3 h-75 justify-content-center align-items-center">
    <form method="POST" action="{{ route('login.authenticate') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="email" class="form-control" placeholder="Enter email" />
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Enter password" />
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
        
@endsection