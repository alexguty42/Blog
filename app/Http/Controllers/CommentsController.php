<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class CommentsController extends Controller
{

    public function index()
    {
        return view('blog.index');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $com = $request->user()->comments()->create($validated);
        $posts = Comment::all();
        return back();
        return view('blog.index');
    }

    public function destroy($come)
        {
            if (auth()->user()->rol == 1){
            $posts = Comment::find($come);
            $posts->delete();
            return back();
            }
        }
}
