<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= "productos";
    protected $primarykey='id';
    protected $fillable =['nombre','descripcion','precio','stock','categoria_id'];
    protected $hidden =['id'];
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
        public function pedidos(){
            return $this->belongsToMany(Producto::class,'detalle_pedidos');
         }




}
