@extends('layouts.app')
@section('title')
Show
@endsection
@section('content')
        <div class="card mt-4"> 
            <div class="card-header">
                 PostInfo
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Title:{{$posts->title}}</h5>
            <p class="card-text">Description:{{$posts->description}}</p>
        </div>

        <div class="card mt-4"> 
            <div class="card-header">
                 Post Creator Info
            </div>
        </div>
        <div class="card-body">

            <h4 class="card-title">Name:{{$posts->user?$posts->user->name:"Not have A previous value"}}</h4>
            <h4 class="card-text">Mail:{{$posts->user->email}}</h4>
            <h4 class="card-text">created_at:{{$posts->user->created_at}}</h4>
        </div>
        @endsection
