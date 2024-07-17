<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="detalle_pedidos";
    protected $primarykey="id";
    protected $fillable=['total','cantidad','id_producto','id_pedido'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}
