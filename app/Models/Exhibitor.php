<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    use HasFactory;

    protected $fillable = ['suffix','nombre','apellido_paterno','apellido_materno','email','direccion','num_celular','descripcion'];

    public function getRouteKeyName()
    {
        return "nombre";
    }

    //Relacion uno a muchos inversa con Usuario

    public function user(){
        return $this->belongsTo(User::class);
    }
}
