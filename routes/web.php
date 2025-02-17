<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PrincipalController;

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




/*INDEX */
Route::get('/', function () {
    return view('index');
});

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::get('/principal', [App\Http\Controllers\PrincipalController::class,'index'])->name('principal');

Route::post('cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route::get('cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeitem');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usuario',[UsuarioController::class,'index'])->name('usuario');

Route::delete('/usuario/{id}/',[UsuarioController::class,'destroy'])->name('usuario.destroy');
Route::get('/usuario/{id}/ver', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/crear',[UsuarioController::class,'create'])->name('usuario.create');
Route::post('/usuario',[UsuarioController::class,'store'])->name('usuario.store');
Route::get('/usuario/{id}/editar',[UsuarioController::class,'edit'])->name('usuario.edit');
Route::put('/usuario/{id}',[UsuarioController::class, 'update'])->name('usuario.update');



Route::get('/producto',[ProductoController::class,'index'])->name('producto');
Route::get('/p',[ProductoController::class,'create'])->name('producto.create');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/buscar', [ProductoController::class, 'search'])->name('productos.search');


Route::delete('/producto/{id}/',[ProductoController::class,'destroy'])->name('producto.destroy');
Route::get('/producto/{id}/ver', [ProductoController::class, 'show'])->name('producto.show');




Route::get('/producto/{id}/editar',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('/producto/{id}',[ProductoController::class, 'update'])->name('producto.update');

Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');


Route::get('/pedido',[PedidoController::class,'index'])->name('pedido');
Route::get('/pedido/crear',[PedidoController::class,'create'])->name('pedido.create');
Route::post('/pedido',[PedidoController::class,'store'])->name('pedido.store');
Route::get('/pedido/{id}/ver',[PedidoController::class,'show'])->name('pedido.show');



Route::get('/rol',[RolController::class,'index'])->name('rol');

Route::delete('/rol/{id}/',[RolController::class,'destroy'])->name('rol.destroy');
Route::get('/rol/{id}/ver', [RolController::class, 'show'])->name('rol.show');
Route::get('/rol/crear',[RolController::class,'create'])->name('rol.create');
Route::post('/rol',[RolController::class,'store'])->name('rol.store');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/categoria',[CategoriaController::class,'index'])->name('categoria');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/po',[CategoriaController::class,'create'])->name('categoria.create');
Route::delete('/categoria/{id}/',[CategoriaController::class,'destroy'])->name('categoria.destroy');
Route::get('/categoria/{id}/editar',[CategoriaController::class,'edit'])->name('categoria.edit');
Route::put('/categoria/{id}',[CategoriaController::class, 'update'])->name('categoria.update');

//HACER PEDIDO//
Route::post('/pedido/process', [PedidoController::class, 'processOrder'])->name('pedido.process');
Route::get('/pedido/cliente', [PedidoController::class, 'clientepedido'])->name('pedido.client');


//Actualizar Cart//
Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
