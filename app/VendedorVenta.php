<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendedorVenta extends Model
{
    protected $fillable = [
        'Empresa', 'Tipodocto', 'TipoCtaCte'
    ];
}
