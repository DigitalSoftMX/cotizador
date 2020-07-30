<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
	public function lives(){
        return $this->belongsToMany('App\Life');
    }
    protected $fillable = [
        'id','nivel_1', 'nivel_2', 'nivel_3','nivel_4', 'nivel_5', 'nivel_6', 'nivel_7', 'nivel_8', 'nivel_9','nivel_10', 'producto', 'nombre', 'vigencia_now', 'vigencia_old',
    ];
}
