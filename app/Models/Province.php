<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $fillable = ['provincia', 'info'];

    // Relacion uno a muchos con Organizadores

    public function details(){
        return $this->hasMany(Organizer::class);
    }

}
