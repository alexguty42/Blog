<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::resource('blog', BlogController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'rol:admin'])->group(function () {
});

Route::get('/admin/users', 'App\Http\Controllers\UserController@index')->name('admin.users.index');

Route::resource('comment', CommentsController::class)
    ->only(['index', 'store','destroy'])
    ->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
