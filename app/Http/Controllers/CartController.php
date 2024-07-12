<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $productos = Producto::find($request->id);
        if(empty($productos))
        return redirect('/');
    Cart::add(
        $productos->id,
        $productos->nombre,
        1,
        $productos->precio,
        ["image"=>$productos->image]

    );
    return redirect()->back()->with("success","Item agregado: ". $productos->nombre);
    }
    public function checkout(){
        return view('cart.checkout');
}
public function removeItem(Request $request){
    Cart::remove($request->rowId);
    return redirect()->back()->with("success","Item eliminado" );

}
public function clear(){
    Cart::destroy();
    return redirect()->back()->with("success","Carrito Vacio" );
}
}

