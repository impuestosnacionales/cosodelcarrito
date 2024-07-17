<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\Producto;
use Cart;
use App\Models\Detalle_pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos=Pedido::all();
        return view('pedidos.pedido',['pedidos'=>$pedidos] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto=Producto::all();
        return view('pedido_crear',['producto'=>$producto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB:: beginTransaction();
        $pedido=new Pedido;
        $pedido->num_p=$request->get('num_pedido');
        $pedido->save();
        $id_producto=$request->get('id_detalle_pedido');
        $cantidad=$request->get('cantidad');
        $cont=0;
        while($cont<count($id_producto)){
            $detalle=new Detalle_pedido;
            $detalle->id_pedido=$pedido->id;
            $detalle->id_producto=$id_producto[$cont];
            $detalle->cantidad=$cantidad[$cont];
        
            $detalle->save();
            $cont=$cont+1;
        }
        DB::commit();
        $pedidos=Pedido::all();
        return view('pedido',['pedidos'=>$pedidos]);

            
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido=Pedido::findOrFail($id);
        return view('pedido_ver',['pedido'=>$pedido]);
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
        $pedido = Pedido::findOrfail($id);
        $pedido->delete();
        $silla = Pedido::all();
        //dd($variable);
        return view('pedido',['silla'=>$silla]);
    }

    
    public function processOrder() {
        // Obtener el contenido del carrito
        $cartItems = Cart::content();
        foreach ($cartItems as $item) {
            $product = Producto::find($item->id);
            if ($item->qty > $product->stock) {
                return redirect()->back()->with('error', 'Uno o más productos en su carrito exceden la cantidad disponible en stock.');
            }
        }
    
        // Iniciar una transacción para asegurarse de que todas las operaciones se completen correctamente
        DB::beginTransaction();
    
        try {
            // Actualizar el stock de cada producto
            foreach ($cartItems as $item) {
                $producto = Producto::find($item->id);
    
                if ($producto) {
                    // Restar la cantidad del stock
                    $producto->stock -= $item->qty;
                    $producto->save();
                }
            }
    
            // Aquí puedes agregar la lógica para crear una orden en la base de datos si es necesario
    
            // Vaciar el carrito después de procesar el pedido
            Cart::destroy();
    
            // Confirmar la transacción
            DB::commit();
    
            return view('pedidos.pedido',['cartItems'=>$cartItems]);
        } catch (\Exception $e) {
            // Revertir la transacción si algo sale mal
            DB::rollback();
    
            return view('pedidos.pedido', ['cartItems'=>$cartItems])->with('error', 'Hubo un problema al procesar tu pedido');
        }
    }
    
}
