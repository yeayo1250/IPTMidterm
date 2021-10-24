<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::get('/', function(){
    return view('landingpage');
});

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);  
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [PostController::class, 'index'])->middleware('auth');
Route::get('/authors', [PostController::class, 'showauthors'])->middleware('auth');
Route::get('/categories/{category}', [PostController::class, 'postscategory'])->middleware('auth');
Route::get('/authors/{user}', [PostController::class, 'showauthorposts'])->middleware('auth');
Route::get('/createnewpost', [PostController::class, 'createnewpost'])->middleware('auth');
Route::post('/createnewpost', [PostController::class, 'storenewpost'])->middleware('auth');
