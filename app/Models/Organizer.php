<?php

namespace App\Models;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    
    protected $table = 'organizers';

    protected $fillable = ['unidad', 'provincia', 'detalle'];

    //Relacion uno a uno inversa con Evento 

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
