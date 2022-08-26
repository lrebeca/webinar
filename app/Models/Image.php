<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = ['imagen'];

    //relacion uno a uno con certidicate

    public function certificate(){
        return $this->hasOne(Certificate::class);
    }
}
