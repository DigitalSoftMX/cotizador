<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Energo extends Model
{
    public function price_energo()
    {
        return $this->hasMany('App\PriceEnergo');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'terminal_id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
