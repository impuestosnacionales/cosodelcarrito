<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;




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




Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/usuario',[UsuarioController::class,'index'])->name('usuario');

Route::delete('/usuario/{id}/',[UsuarioController::class,'destroy'])->name('usuario.destroy');
Route::get('/usuario/{id}/ver', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/crear',[UsuarioController::class,'create'])->name('usuario.create');
Route::post('/usuario',[UsuarioController::class,'store'])->name('usuario.store');
Auth::routes();
Route::get('/usuario/{id}/editar',[UsuarioController::class,'edit'])->name('usuario.edit');
Route::put('/usuario/{id}',[UsuarioController::class, 'update'])->name('usuario.update');



Route::get('/producto',[ProductoController::class,'index'])->name('producto');
Route::get('/p',[ProductoController::class,'create'])->name('producto.create');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/buscar', [ProductoController::class, 'search'])->name('productos.search');


Route::delete('/producto/{id}/',[ProductoController::class,'destroy'])->name('producto.destroy');
Route::get('/producto/{id}/ver', [ProductoController::class, 'show'])->name('producto.show');
Route::get('/producto/crear',[ProductoController::class,'create'])->name('producto.create');
Route::post('/producto',[ProductoController::class,'store'])->name('producto.store');

Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');


Auth::routes();
Route::get('/producto/{id}/editar',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('/producto/{id}',[ProductoController::class, 'update'])->name('producto.update');


Route::get('/pedido',[PedidoController::class,'index'])->name('pedido');
Route::get('/pedido/crear',[PedidoController::class,'create'])->name('pedido.create');
Route::post('/pedido',[PedidoController::class,'store'])->name('pedido.store');



Route::get('/rol',[RolController::class,'index'])->name('rol');

Route::delete('/rol/{id}/',[RolController::class,'destroy'])->name('rol.destroy');
Route::get('/rol/{id}/ver', [RolController::class, 'show'])->name('rol.show');
Route::get('/rol/crear',[RolController::class,'create'])->name('rol.create');
Route::post('/rol',[RolController::class,'store'])->name('rol.store');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/producto', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/po',[CategoriaController::class,'create'])->name('categoria.create');
