<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potesta extends Model
{
    public function price_potesta()
    {
        return $this->hasMany('App\PricePotesta');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
