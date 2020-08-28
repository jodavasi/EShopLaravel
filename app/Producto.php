<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'SKU', 'nombre', 'descripcion', 'imagen', 'stock', 'precio', 'categoria_id','categoria_nombre'
    ];
}
