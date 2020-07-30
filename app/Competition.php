<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function terminals()
    {
        return $this->belongsTo('App\Terminal', 'id');
    }

    protected $fillable = [
        'id', 'nombre', 'terminal_id', 'created_at', 'updated_at'
    ];
}
