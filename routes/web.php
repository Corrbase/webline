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

Route::get('/create/post', [App\Http\Controllers\UserController::class, 'create'])->middleware('auth');

// User Route

Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->middleware('guest');
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register'])->middleware('guest');

// Requests

Route::post('/r/register', [\App\Http\Controllers\UserController::class, 'registerR']);
Route::post('/r/login', [\App\Http\Controllers\UserController::class, 'loginR']);
Route::post('/r/logout', [\App\Http\Controllers\UserController::class, 'logoutR']);
