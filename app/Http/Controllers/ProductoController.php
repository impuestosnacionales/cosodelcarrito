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
        // Validación del formulario
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Asegúrate de ajustar las restricciones según sea necesario
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|integer',
            'stock' => 'required|integer',

        ]);

        $producto = new Producto($request->except('image'));

        if ($request->hasFile('image')) {
            $logoFile = $request->file('image');
            $path = '/img';
            $filename = date('YmdHis') . "." . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path($path), $filename);

            $producto->image = $filename;
        }

        $producto->save();
        return redirect()->action([ProductoController::class, 'index']);
    }
    public function destroy(string $id)
    {
        //
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return redirect()->action([ProductoController::class,'index']);
    }

    public function edit(string $id)
{
 $producto= Producto::findOrfail($id);
 $categoria= Categoria::all();
  return view('producto.editar',['producto'=>$producto,'categoria'=>$categoria,]); 

}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
   $producto=Producto::findOrFail($id);
   $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->categoria_id= $request->categoria_id;

    $producto->save();

    $productos = Producto::all();

    return view('producto.index',['productos'=>$productos]);

}
}
