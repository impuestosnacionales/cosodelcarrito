<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= "usuarios";
    protected $primarykey='id';
    protected $fillable =['nombre','correo','contraseña','rol_id'];
    protected $hidden =['id'];
    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id','id');
    }
}
