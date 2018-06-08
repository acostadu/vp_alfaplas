<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    public $fillable = ['id', 'descripcion', 'detalle'];
}
