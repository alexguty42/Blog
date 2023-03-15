<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Comment;
class BlogController extends Controller
{
    public function show($id)
    {
        $blogs = Blog::find($id);
        $comments = $blogs->blogs;
        return view('blogs.show', compact('blog', 'comments'));
    }
    public function index()
{
    $comments = Blog::all();
    return view('blog.index', ['comments' => $comments]);
}

public function store(Request $request)

{$validated = $request->validate([
    'message' => 'required|string|max:255',
]);
$blogs = Blog::all();
$comments = Blog::all();
($request->user()->blog()->create($validated));

//return ('blog.index', compact('blogs'));
return view('blog.index', compact('blogs', 'comments'));
//return redirect(route('blog'  ,['blogs'=>$blogs]));
}
}
