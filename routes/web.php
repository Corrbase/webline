<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

// home Route

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', function (){return redirect('/');} );

// Post Route


Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->middleware('auth');
Route::get('/posts/edit/{posts}', [\App\Http\Controllers\PostsController::class, 'edit'])->middleware('auth');
Route::get('/posts/delete/{posts}', [\App\Http\Controllers\PostsController::class, 'delete'])->middleware('auth');
Route::get('/posts/{posts}', [App\Http\Controllers\PostsController::class, 'post']);

// User Route

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register'])->middleware('guest');

// Requests

Route::post('/r/register', [\App\Http\Controllers\UserController::class, 'registerR']);
Route::post('/r/login', [\App\Http\Controllers\UserController::class, 'loginR']);
Route::post('/r/logout', [\App\Http\Controllers\UserController::class, 'logoutR']);
Route::put('/r/edit', [\App\Http\Controllers\UserController::class, 'update']);

Route::post('/r/post', [\App\Http\Controllers\PostsController::class, 'postR']);
Route::put('/r/post/{posts}', [\App\Http\Controllers\PostsController::class, 'update']); // update the post
Route::delete('/r/posts/delete/{posts}', [\App\Http\Controllers\PostsController::class, 'destroy']);
