<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'title' => 'required|string',
            'content' => 'required'
        ]);

        $post = $request->user()->posts()->create($validatedPost);

        event(new Registered($post));

        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $post = Post::find($id);
        $comments = $post->comments()->get();
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $post = Post::find($id);

        return view('posts.editForm', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title' => 'required|min:4|max:255',
            'content' => 'required|min:10'
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
