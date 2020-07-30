<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*public function users(){
        return $this->belongsToMany('App\User','Role' ,'Estacion')->withPivot('id','name');
    }*/
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function menus(){
        return $this->belongsToMany('App\Menu');
    }

    protected $guarded = ['id'];

    public function estacions(){
        return $this->belongsToMany('App\Estacion');
    }
}
