<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;

Route::get('/',[PostController::class, 'index'])->name('home');

Route::post('newsletter', NewsletterController::class);

Route::get('user/{user:username}', [UserController::class, 'show'])->middleware('auth', 'active_user');
Route::get('user/avatar/{user:username}', [UserController::class, 'edit'])->middleware('auth', 'active_user');
Route::patch('user/avatar/{user:username}', [UserController::class, 'update'])->middleware('auth', 'active_user');
Route::delete('user/{user:username}', [UserController::class, 'destroy'])->middleware('auth', 'active_user');


Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comment', [CommentController::class, 'store'])->middleware('auth', 'active_user');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::middleware('can:admin')->group(function (){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::get('admin/users', [AdminUserController::class, 'index']); 
    Route::patch('admin/users', [AdminUserController::class, 'ban']); 
   /*  Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);*/
});
