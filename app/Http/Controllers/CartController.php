<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $productos = Producto::find($request->id);
        if (empty($productos)) {
            return redirect('/');
        }
        
        $cantidad = $request->input('quantity', 1); // Obtener la cantidad del request, por defecto 1
        Cart::add(
            $productos->id,
            $productos->nombre,
            $cantidad, // Usar la cantidad seleccionada
            $productos->precio,
            ["image" => $productos->image]
        );
        
        return redirect()->back()->with("success", "Item agregado: " . $productos->nombre);
    }
    




    public function checkout(){
        return view('cart.checkout');
}
public function removeItem(Request $request)
{
    $rowId = $request->input('rowId');
    $removeQty = $request->input('remove_qty', 1); // Default to 1 if not specified

    $item = Cart::get($rowId);
    
    if ($item) {
        // Si la cantidad a eliminar es mayor o igual a la cantidad en el carrito, eliminar el artículo
        if ($removeQty >= $item->qty) {
            Cart::remove($rowId);
        } else {
            // De lo contrario, reducir la cantidad del artículo en el carrito
            Cart::update($rowId, $item->qty - $removeQty);
        }
    }

    return redirect()->back()->with('success', 'Artículo actualizado correctamente.');
}
public function clear(){
    Cart::destroy();
    return redirect()->back()->with("success","Carrito Vacio" );
}

public function updateQuantity(Request $request) {
    $rowId = $request->input('rowId');
    $qty = $request->input('qty');

    // Actualizamos la cantidad en el carrito
    Cart::update($rowId, $qty);

    // Obtenemos el artículo actualizado y el subtotal del carrito
    $item = Cart::get($rowId);
    $itemTotal = number_format($item->qty * $item->price, 2);
    $cartSubtotal = number_format(Cart::subtotal(), 2);

    // Devolvemos los valores como respuesta JSON
    return response()->json([
        'itemTotal' => $itemTotal,
        'cartSubtotal' => $cartSubtotal
    ]);
}

}

