<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceHamse extends Model
{
    protected $fillable = [
        'id','hamse_id', 'precio_regular', 'precio_premium','precio_disel', 'created_at', 'updated_at',
    ];
}
