<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class CategoriaController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        $productos = Producto::where('categoria_id', $id)->get();

        return view('categoria.show', compact('categoria', 'productos'));
    }

    public function create()
    {
        return view('categoria.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validación del formulario
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'codigo' => 'required|integer'

        ]);

        $categoria = new Categoria($request->except('image'));

        if ($request->hasFile('image')) {
            $logoFile = $request->file('image');
            $path = 'assets/img/';
            $filename = date('YmdHis') . "." . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path($path), $filename);

            $categoria->image = $path . $filename;
        }

        $categoria->save();
        return redirect()->action([CategoriaController::class, 'index']);

        /*$categoria = Categoria::all();
        return redirect()->route('principal');*/
    }
    public function index()
    {
        //
        $categoria=Categoria::all();
        return view('categoria.index', ['categoria'=>$categoria]);
    }
    public function destroy(string $id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->action([CategoriaController::class,'index']);
    }
}
