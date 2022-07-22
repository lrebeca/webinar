<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = ['titulo', 'documento', 'id_evento'];

    //Relacion uno a muchos inversa con evento

    public function user(){
        return $this->belongsTo(Event::class);
    }

}
