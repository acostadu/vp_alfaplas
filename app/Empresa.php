<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $fillable=['codigo', 'descripcion','vigencia']; // 'rut',
}
