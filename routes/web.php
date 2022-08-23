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


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');


// User Route

Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->middleware('guest');
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register'])->middleware('guest');

Route::post('/r/register', [\App\Http\Controllers\UserController::class, 'store']);
