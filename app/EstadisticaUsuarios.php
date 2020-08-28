<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaUsuarios extends Model
{
    protected $fillable = [
        'cliente_id','total','cantidad'
    ];
}
