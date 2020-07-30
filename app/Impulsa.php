<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impulsa extends Model
{
    public function price_impulsa()
    {
        return $this->hasMany('App\PriceImpulsa');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
