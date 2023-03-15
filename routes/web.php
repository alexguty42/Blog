<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/blog', 'App\Http\Controllers\BlogController@index');
Route::get('/blog/create', 'App\Http\Controllers\BlogController@create');
Route::post('/blog', 'App\Http\Controllers\BlogController@store');
Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@show');
Route::post('/blog/{blogId}/comments', [BlogController::class, 'store'])->name('blogs.comments.store');

Route::get('/blog/{id}/edit', 'App\Http\Controllers\BlogController@edit');
Route::put('/blog/{id}', 'App\Http\Controllers\BlogController@update');
Route::delete('/blog/{id}', 'App\Http\Controllers\BlogController@destroy');
Route::post('/posts/{post}/comments', 'App\Http\Controllers\CommentController@store')->name('comment.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::get('/posts',function(){
    $posts=Post::all();
    return view('posts.index',compact('posts'));
});
Route::get('/blog',function(){
    $blogs=Blog::all();
    return view('blog',compact('blogs'));
}); */

Route::get('/', [BlogController::class,'dashboard'])->name('dashboard');


Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('blog', BlogController::class)
    ->only(['index','store','edit','update'])
    ->middleware(['auth','verified']);

    Route::get('/',[HomeController::class,'index'])->name('home');

require __DIR__.'/auth.php';
