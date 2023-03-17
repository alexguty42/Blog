<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class BlogController extends Controller

{

        public function index()
        {
            $comments = Blog::with('user')->latest()->get();
            $posts = Comment::all();
            $users = User::all();
            return view('blog.index', ['comments' => $comments,'posts' => $posts, 'users' => $users  ]);
        }

        public function store(Request $request)

        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'message' => 'required|string|max:1000'
            ]);
            $blog = $request->user()->blog()->create($validated);

            $comments = Blog::all();
            return back();
            return view('blog.index');
        }

        public function destroy($id)
        {
            if (auth()->user()->rol == 1){
            $comment = Blog::find($id);
            $comment->delete();
            return back();
            }
        }
    }


