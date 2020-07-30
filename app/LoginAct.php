<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginAct extends Model
{
    protected $fillable = [
        'id','nombre', 'email','inicio', 'created_at', 'updated_at',
    ];
}
