<?php

namespace App\Models;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    
    protected $table = 'organizers';

    protected $fillable = ['unidad', 'detalle', 'province_id'];

    //Relacion uno a uno inversa con Evento 

    public function event(){
        return $this->belongsTo(Event::class);
    }

    // Relacion uno a muchos con provincias invesa
    public function user(){
        return $this->belongsTo(Province::class);
    }

}
