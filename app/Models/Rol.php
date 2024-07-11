<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= "roles";
    protected $primarykey='id';
    protected $fillable =['nombre'];
    protected $hidden =['id'];
    public function usuario(){
        return $this->hasMany(Usuario::class);
    }
}
