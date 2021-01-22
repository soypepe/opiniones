<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\IngresoController;
use App\Http\Controllers\Auth\SalirController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

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
    return view('home');
})->name('inicio');

Route::get('/prueba', function(){
    return view('usuarios.posts.usr');
})->name('prueba');

Route::get('/panel', 
[PanelController::class, 'index'])->name('panel');

Route::get('/registro',
[RegistroController::class, 'index'])->name('registro');

Route::post('/registro',
[RegistroController::class, 'store']);

Route::get('/ingreso',
[IngresoController::class, 'index'])->name('ingreso');

Route::get('/usuarios/{user:username}/posts',
[UserPostController::class, 'index'])->name('usuarios.posts');

Route::post('/ingreso',
[IngresoController::class, 'store']);

Route::post('/salir',
[SalirController::class, 'store'])->name('salir');

Route::get('/posts',
[PostController::class, 'index'])->name('posts');

Route::get('/posts/{post}',
[PostController::class, 'mostrar'])->name('posts.mostrar');

Route::post('/posts',
[PostController::class, 'store']);

Route::delete('/posts/{post}',
[PostController::class, 'destroy'])->name('posts.destroy');
    
Route::post('/posts/{post}/likes',
[PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/posts/{post}/likes',
[PostLikeController::class, 'destroy'])->name('posts.likes');