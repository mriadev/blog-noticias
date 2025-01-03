<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReaderController;
use App\Http\Middleware\AdminMiddleware;

// Rutas accesibles solo para usuarios autenticados
Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
   
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
   
});

Route::middleware(['auth','reader'])->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{user}/password', [ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/{user}/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');
});

// Rutas accesibles solo para administradores
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/genres', [GenreController::class, 'genres'])->name('admin.genres.index');
    Route::post('/dashboard/genres', [GenreController::class, 'store'])->name('admin.genres.store');
    Route::get('/dashboard/genres/{genre}/edit', [GenreController::class, 'edit'])->name('admin.genres.edit');
    Route::put('/dashboard/genres/{genre}', [GenreController::class, 'update'])->name('admin.genres.update');
    Route::delete('/dashboard/genres/{genre}', [GenreController::class, 'destroy'])->name('admin.genres.destroy');

    Route::get('/dashboard/readers', [ReaderController::class, 'users'])->name('admin.users.index');
    Route::get('/dashboard/readers/create', [ReaderController::class, 'create'])->name('admin.users.create');
    Route::post('/dashboard/readers/create', [ReaderController::class, 'store'])->name('admin.users.store');
    Route::get('/dashboard/readers/{user}/edit', [ReaderController::class, 'edit'])->name('admin.users.edit');
    Route::put('/dashboard/readers/{user}', [ReaderController::class, 'update'])->name('admin.users.update');
    Route::delete('/dashboard/readers/{user}', [ReaderController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/dashboard/posts', [AdminController::class, 'posts'])->name('admin.posts.index');
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/dashboard/posts/create', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/dashboard/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/dashboard/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/dashboard/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});

// Rutas accesibles solo para invitados
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('recover-password', [LoginController::class, 'recoverPassword'])->name('password.recover');
    Route::post('recover-password', [LoginController::class, 'resetPassword'])->name('password.update');
});

// Ruta para cerrar sesión
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});