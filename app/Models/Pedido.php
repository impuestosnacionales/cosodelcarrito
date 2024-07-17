<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="pedidos";
    protected $primarykey="id";
    protected $fillable=['num_pedido','fecha','estado','usuario_id'];

     public function productos(){
        return $this->belongsToMany(Pedido::class,'detalle_pedidos','id');
     }

     public function detalles()
     {
         return $this->hasMany(Detalle_pedido::class, 'id_pedido');
     }

   
}
