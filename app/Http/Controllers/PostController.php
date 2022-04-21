<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post',['posts'=>$posts]);
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $user->post()->save($post);
        return redirect(route('post_index'))->with('status', 'Post Added');
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('editpost', ['post'=>$post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route("dashboard"))->with('status', 'Post Updated !!');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route("dashboard"))->with('status', 'Post Deleted !!');
    }
}
