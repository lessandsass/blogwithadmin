<?php

use App\Http\Controllers\LoginUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;

Route::view('/', 'welcome')->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show')->middleware('can-view-post');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
});


Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginUserController::class, 'login'])->name('login');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

