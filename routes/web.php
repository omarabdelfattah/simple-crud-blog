<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('/user/create', [UserController::class, 'create'])->name('users.create');

Route::post('/user', [UserController::class, 'store'])->name('users.store');

Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('users.show');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->where('id', '[0-9]+')->name('users.edit');

Route::put('/user/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('users.update');

Route::delete('/user/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('users.destroy');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/post', [PostController::class, 'store'])->name('posts.store');

Route::get('/post/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('posts.show');

Route::get('/post/{id}/edit', [PostController::class, 'edit'])->where('id', '[0-9]+')->name('posts.edit');

Route::put('/post/{id}', [PostController::class, 'update'])->where('id', '[0-9]+')->name('posts.update');

Route::delete('/post/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+')->name('posts.destroy');

Route::get('/posts/deleted', [PostController::class, 'deleted_list'])->name('posts.deleted_list');
Route::post('/posts/{id}/deleted', [PostController::class, 'restore'])->name('posts.restore');

Route::fallback(function () {
    return 'Route not found';
});