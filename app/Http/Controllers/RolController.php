<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $silla = Rol::all();
        //dd($variable);
        return view('rol',['silla'=>$silla]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rol_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol=new Rol($request->all());
        $rol->save();

        $silla = Rol::all();
//dd($variable);
        return view('rol',['silla'=>$silla]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol=Rol::findOrFail($id);
        return view('rol_ver',['rol'=>$rol]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::findOrfail($id);
        $rol->delete();
        $silla = Rol::all();
        //dd($variable);
        return view('rol',['silla'=>$silla]);
    }
}