<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $productos = Producto::with('categoria')->get();
        return view('producto.index', ['productos' => $productos, 'categorias' => $categorias]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $productos = Producto::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();
        $categorias = Categoria::all();
        return view('front.principal', compact('productos', 'categorias', 'query'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('producto.producto_crear', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $producto = new Producto($request->all());
        $producto->save();
        return redirect()->route('principal');
    }
    public function destroy(string $id)
    {
        //
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return redirect()->action([ProductoController::class,'index']);
    }
}
