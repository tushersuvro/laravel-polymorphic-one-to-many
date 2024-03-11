<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts/edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/delete/{post}', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
