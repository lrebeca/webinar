<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'email', 'carnet_identidad', 'carnet_universitario', 'n_celular', 'n_deposito', 'img_deposito', 'estado', 'id_evento'];

    public function getRouteKeyName()
    {
        return "evento";
    }

}
