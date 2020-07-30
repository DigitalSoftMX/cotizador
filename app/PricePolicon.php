<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricePolicon extends Model
{
    protected $fillable = [
        'id','policon_id', 'precio_regular', 'precio_premium','precio_disel', 'created_at', 'updated_at',
    ];
}
