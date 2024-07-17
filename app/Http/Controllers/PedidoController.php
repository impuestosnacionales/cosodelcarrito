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
    public function clientepedido($id){
        $detalle = Detalle_pedido::where('pedido_id', $id)->get(); // Filtrar los detalles del pedido específico
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.detallecliente', ['pedido' => $pedido, 'detalle' => $detalle]);
    }

    public function show(string $id)
    {
        $detalle = Detalle_pedido::all();
        $pedido=Pedido::findOrFail($id);
        return view('pedidos.pedido_ver',['pedido'=>$pedido , 'detalle'=>$detalle]);
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

    
    public function processOrder(Request $request)
{
    // Obtener el contenido del carrito
    $cartItems = Cart::content();
    
    // Verificar el stock de los productos
    foreach ($cartItems as $item) {
        $product = Producto::find($item->id);
        if ($item->qty > $product->stock) {
            return redirect()->back()->with('error', 'Uno o más productos en su carrito exceden la cantidad disponible en stock.');
        }
    }

    DB::beginTransaction();

    try {
        // Crear el nuevo pedido
        $ultimoPedido = Pedido::orderBy('id', 'desc')->first();
        $nuevoNumPedido = $ultimoPedido ? $ultimoPedido->num_pedido + 1 : 1;
        
        $pedido = new Pedido();
        $pedido->num_pedido = $nuevoNumPedido;
        // Asignar el id del usuario autenticado
        $pedido->fecha = now();
        $pedido->estado = 'nuevo';
        $pedido->save();

        // Guardar los detalles del pedido y actualizar el stock de productos
        foreach ($cartItems as $item) {
            $detalle = new Detalle_pedido();
            $detalle->id_pedido = $pedido->id;
            $detalle->id_producto = $item->id;
            $detalle->cantidad = $item->qty;
            $detalle->total = $item->qty * $item->price; // Asegurarse de que el campo total esté en Detalle_pedido
            $detalle->save();

            $producto = Producto::find($item->id);
            if ($producto) {
                $producto->stock -= $item->qty;
                $producto->save();
            }
        }

        Cart::destroy();

        DB::commit();

        return view('pedidos.pedidocliente', ['pedido' => $pedido])->with('success', 'Pedido realizado con éxito');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Ocurrió un error al procesar el pedido.');
    }
}

    
}
