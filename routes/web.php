<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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


Route::get('/users/register', [UserController::class, 'register'])->name('users.register');
Route::post('/users/handleRegister', [UserController::class, 'handleRegister'])->name('users.handleRegister');
Route::get('/users/login', [UserController::class, 'login'])->name('users.login');
Route::post('/users/handleLogin', [UserController::class, 'handleLogin'])->name('users.handleLogin');
Route::get('/notAuth', [UserController::class, 'handleMessage'])->name('notAuth');

Route::middleware('IsLoggedUser')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/users/logOut', [UserController::class, 'logOut'])->name('users.logOut');
});
Route::middleware('IsAdmin')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
