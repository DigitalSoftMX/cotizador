<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Life extends Model
{
    public function discounts(){
        return $this->belongsToMany('App\Discount');
    }

    protected $fillable = [
        'id','inicio', 'fin',
    ];
}
