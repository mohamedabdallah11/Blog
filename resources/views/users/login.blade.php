
@extends('layouts.app')
@section('title')
Login
@endsection 
@section('content')

<form method="POST" action="{{route('users.handleLogin')}}">
    @csrf
    
        <div class="mb-3">
            <label class="form-label">email</label>
            <input name="email" required type="email" class="form-control" value="{{old('email')}}">
        </div>
 
        <div class="mb-3">
            <label class="form-label">password</label>
            <input name="password" required type="password" class="form-control" >
        </div>
        <button class="btn btn-success">Login</button>
    </form>
@endsection


