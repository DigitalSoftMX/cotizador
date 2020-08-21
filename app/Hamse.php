<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hamse extends Model
{
	public function price_hamse()
    {
        return $this->hasMany('App\PriceHamse');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
