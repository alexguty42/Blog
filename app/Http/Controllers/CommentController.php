<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create($validatedData);

        return back();
    }

    public function show(Post $post){
    $comments = $post->comments;
    return view('comments.show', compact('comments'));
    }

    public function create(){
    return view('comments.create');
}
}
