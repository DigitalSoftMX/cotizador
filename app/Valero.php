<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valero extends Model
{
	/*public function terminals()
    {
        return $this->hasManyThrough('App\Terminal');
    }*/

    public function terminals()
    {
        return $this->hasManyThrough('App\Terminal');
    }
    protected $fillable = [
        'id','terminal_id','precio_regular','precio_premium','precio_disel','created_at','updated_at',
    ];
}
