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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', function (){return redirect('/');} );


Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile')->middleware('auth');


// User Route

Route::get('/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register'])->middleware('guest');

// Requests

Route::post('/r/register', [\App\Http\Controllers\UserController::class, 'registerR']);
Route::post('/r/login', [\App\Http\Controllers\UserController::class, 'loginR']);
Route::post('/r/logout', [\App\Http\Controllers\UserController::class, 'logoutR']);
