<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['nombre','apellido_paterno','apellido_materno','email','carnet_identidad','carnet_universitario', 'n_celular','n_deposito', 'estado','img_deposito','id_evento'];

    public function getRouteKeyName()
    {
        return "nombre";
    }

        
    //relacion uno a muchos inversa con eventos 

    public function event(){
        return $this->belongsTo(Event::class);
    }
    
    // Relacion uno a uno con certificado

    public function certificate(){
        return $this->hasOne(Certificate::class);
    }
    
}