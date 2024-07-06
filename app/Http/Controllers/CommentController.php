<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post, User $user)
    {
        $validated = $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $validated['comment'];
        $comment->post_id = $post->id;
        $comment->user_id = $user->id;

        $comment->save();

        return redirect()->route('post.show', ['post' => $post]);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();


        return redirect()->back();
    }
}
