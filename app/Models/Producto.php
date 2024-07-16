<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'image', 'categoria_id'];
    protected $hidden = ['id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'detalle_pedidos', 'producto_id', 'pedido_id');
    }
}

