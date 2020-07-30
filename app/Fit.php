<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fit extends Model
{
    public function terminal(){
        return $this->hasOne('App\Terminal', 'id', 'terminal_id');
    }

    protected $fillable = [
        'id','terminal_id','policom','impulsa','comision', 'regular_fit', 'premium_fit','disel_fit','created_at','updated_at',
    ];
}
