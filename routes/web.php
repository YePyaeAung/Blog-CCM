<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ BlogController::class, 'index' ]);
Route::get('/blogs/{blog:slug}', [ BlogController::class, 'show' ]);
Route::get('/register', [ AuthController::class, 'create' ])->middleware('guest');
Route::post('/register', [ AuthController::class, 'store' ])->middleware('guest');
Route::post('/logout', [ AuthController::class, 'logout' ])->middleware('auth');

Route::get('/login', [ AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [ AuthController::class, 'login_store' ])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments', [ CommentController::class, 'store' ]);
