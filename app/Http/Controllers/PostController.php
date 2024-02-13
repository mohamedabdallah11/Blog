<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allposts = Post::all();
        return view('posts.index', ['posts' => $allposts]);
    }
    public function show($postId)
    {
        $PostsData = Post::findOrFail($postId);
        return  view('posts.show', ['posts' => $PostsData]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator'=>['required','exists:users,id']
        ]);
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator; 

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator

        ]);
        return to_route('posts.index');
    }
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit',['users' => $users, 'post' => $post]);
    }
    public function update($postId)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator'=>['required','exists:users,id']
        ]);
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        $SinglePostFromDb = Post::find($postId);
        $SinglePostFromDb->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator
        ]);

        return to_route('posts.show', $postId);
    }


    public function destroy($postId)
    {
        $SinglePost = Post::find($postId);
        $SinglePost->delete();

        return to_route('posts.index');
    }
}
