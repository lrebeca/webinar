<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['provincia', 'departamento'];

    public function getRouteKeyName()
    {
        return "provincia";
    }



}
