<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceEnergo extends Model
{
    protected $fillable = [
        'id','energo_id', 'precio_regular', 'precio_premium','precio_disel', 'created_at', 'updated_at',
    ];
}
