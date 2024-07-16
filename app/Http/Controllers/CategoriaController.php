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
        $categoria=new Categoria($request->all());
        $categoria->save();

        $categoria = Categoria::all();
        return redirect()->route('principal');
        
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
