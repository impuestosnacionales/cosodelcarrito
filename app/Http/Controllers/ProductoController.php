<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    // Otros métodos...

    /**
     * Handle the search request.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $productos = Producto::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();

        $categorias = Categoria::all();

        return view('home', compact('productos', 'categorias', 'query'));
    }
}
