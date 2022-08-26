<?php

namespace App\Models;

use App\Models\Admin\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    
    protected $table = 'certificates';

    protected $fillable = ['detalle','fecha', 'id_evento', 'image_id'];

    //Relacion uno a uno inversa con evento

    public function user(){
        return $this->belongsTo(Event::class);
    }

    //Relacion uno a uno inversa con Estudiantes 

    // public function student(){
    //     return $this->belongsTo(Student::class);
    // }
    
    // Relacion uno a muchos con students
    public function students(){
        return $this->hasMany(Student::class);
    }

    // relacion uno a uno con images inversa

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
