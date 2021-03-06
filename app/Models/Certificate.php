<?php

namespace App\Models;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    

    //Relacion uno a muchos inversa con evento

    public function user(){
        return $this->belongsTo(Event::class);
    }

    //Relacion uno a uno inversa con Estudiantes 

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
