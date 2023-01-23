<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;

Route::get('/',[PostController::class, 'index'])->name('home');

Route::post('newsletter', NewsletterController::class);



Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comment', [CommentController::class, 'store'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');