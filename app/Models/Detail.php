<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    protected $fillable = ['detalle', 'link', 'id_evento'];

    //Relacion uno a muchos inversa con evento

    public function user(){
        return $this->belongsTo(Event::class);
    }

}
