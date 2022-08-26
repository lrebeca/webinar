<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    // relacion uno a uno con usuario inversa

    public function user(){
        return $this->belongsTo(User::class);
    }
}   
