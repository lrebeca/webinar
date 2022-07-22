<?php

namespace App\Models\Admin;

use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Organizer;
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

    //Relacion uno a muchos con certificados

    public function certificates(){
        return $this->hasMany(Certificate::class);
    }

     // Relacion uno a uno con organizador

     public function organizer(){
        return $this->hasOne(Organizer::class);
    }

    //Relacion uno a muchos con Detalles (links)

    public function details(){
        return $this->hasMany(Detail::class);
    }

    //Relacion uno a muchos con Documentos

    public function documents(){
        return $this->hasMany(Document::class);
    }

}