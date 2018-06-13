<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public $fillable = ['id', 'descripcion', 'detalle', 'vigencia'];
}
