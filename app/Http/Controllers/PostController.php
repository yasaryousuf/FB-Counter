<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.tutorial.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.tutorial.create');
    }


    public function store(Request $request)
    {
        $this->validateTuts($request);

        $post = new Post;
        $post->post_title   = $request->post_title;
        $post->post_slug    = str_slug($request->post_title);
        $post->post_content = $request->post_content;
        $post->post_type    = "tutorial";
        $post->save();

        return back()->with('message', 'Post is saved to database!');
    }


    public function show($slug)
    {
        $post = Post::where('post_slug', $slug)->firstOrFail();
        return view('general.tutorial',compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.tutorial.edit',compact('post'));
    }


    public function update(Request $request)
    {
        $this->validateTuts($request);

        $post = Post::find($request->id);
        $post->post_title   = $request->post_title;
        $post->post_slug    = str_slug($request->post_title);
        $post->post_content = $request->post_content;
        $post->post_type    = "tutorial";
        $post->save();

        return back()->with('message', 'Post is updated in database!');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('message', 'Post is deleted from database!');        
    }


    public function validateTuts($request)
    {
        $request->validate([
            'post_title' => 'required|max:200',
        ]);
    }

}
