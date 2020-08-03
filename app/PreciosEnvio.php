<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreciosEnvio extends Model
{
    protected $fillable = [
        'id','desgaste_unidad','costo_operador','consumo_diesel','seguro_unidad'
    ];
}
