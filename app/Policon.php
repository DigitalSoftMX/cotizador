<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policon extends Model
{
	public function price_policon()
    {
        return $this->hasMany('App\PricePolicon');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'terminal_id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
