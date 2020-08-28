<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    
    protected $fillable = [
        'id_cliente', 'id_producto', 'cantidad_producto'
    ];
}
