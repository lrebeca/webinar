<?php

namespace App\Models\Admin;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = ['evento', 'detalle', 'costo_student', 'costo_prof', 'fecha_inicio', 'fecha_fin', 'imagen', 'link_whatsapp', 'link_telegram', 'estado', 'id_expositor', 'id_organizador'];


    public function getRouteKeyName()
    {
        return "evento";
    }

    //Relacion uno a muchos inversa con Usuario

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos con estudiantes

    public function students(){
        return $this->hasMany(Student::class);
    }

}