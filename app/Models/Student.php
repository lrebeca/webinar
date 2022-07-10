<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

        
    //relacion uno a muchos inversa con eventos 

    public function event(){
        return $this->belongsTo(Event::class);
    }
    
}