<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Rol::all();
        $silla = Usuario::with('rol')->get();
        return view('usuario',['silla'=>$silla, 'rol'=>$rol]);
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    $rol=Rol::all();
    return view('usuario_crear',['rol'=>$rol]);
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $usuario=new Usuario($request->all());
    $usuario->save();

    $silla = Usuario::all();
    //dd($variable);
    return view('usuario',['silla'=>$silla]);

}

/**
 * Display the specified resource.
 */
public function show(string $id)
{
    $usuario=Usuario::findOrFail($id);
    return view('usuario_ver',['usuario'=>$usuario]);

}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
 /** $producto= Producto::findOrfail($id);
  *return view('producto_editar',['producto'=>$producto]); */

}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
   /**  $producto=Producto::findOrFail($id);
    *$producto->nombre = $request->nombre;
    *$producto->precio = $request->apellido;
    *$producto->categoria = $request->direccion;
    *$producto->save();

    *$silla = Producto::all();
    *dd($variable);
    *return view('producto',['silla'=>$silla]); */

}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $usuario = Usuario::findOrfail($id);
    $usuario->delete();
    $silla = Usuario::all();
    //dd($variable);
    return view('usuario',['silla'=>$silla]);

}
}