
@extends('layouts.app')
@section('title')
Register
@endsection 
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('users.handleRegister')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">username</label>
            <input name="name" required type="text" class="form-control" value="{{old('name')}}" >
        </div>
 
        <div class="mb-3">
            <label class="form-label">email</label>
            <input name="email" required type="email" class="form-control" value="{{old('email')}}">
        </div>
 
        <div class="mb-3">
            <label class="form-label">password</label>
            <input name="password" required type="password" class="form-control"  >
        </div>
        <button class="btn btn-success">Register</button>
    </form>
@endsection




