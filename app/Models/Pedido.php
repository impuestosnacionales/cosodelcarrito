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
    protected $fillable=['num_pedido','usuario_id'];

     public function productos(){
        return $this->belongsToMany(Pedido::class,'detalle_pedidos');
     }
}
