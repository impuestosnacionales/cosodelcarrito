<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class PrincipalController extends Controller
{
    //
    public function index()
    {
        $categorias = Categoria::all(); 
        return view('front.principal', compact('categorias')); 
    }
}
