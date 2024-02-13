
@extends('layouts.app')
@section('title')
index
@endsection
@section('content')
    <div class="text-center">
    <a href="{{route('posts.create')}}" class="btn btn-success">CreatePost</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titles</th>
      <th scope="col">Postedby</th>
      <th scope="col">CreatedAt</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
  @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
        <form style="display: inline;" method="POST" action="{{route('posts.destroy',$post->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" href="#" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
   </div>
</div>
  </tbody>
</table>
@endsection

