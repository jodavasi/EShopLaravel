<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'item_id','cliente_id','item_cantidad'
    ];
}
