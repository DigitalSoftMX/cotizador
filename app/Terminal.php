<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{

    public function fits()
    {
        return $this->hasMany('App\Fit');
    }

    public function fit()
    {
        return $this->belongsTo('App\Fit', 'id', 'terminal_id');
    }

    public function competitions()
    {
        return $this->hasMany('App\Competition');
    }

    public function policons()
    {
        return $this->hasMany('App\Policon');
    }

    public function impulsas()
    {
        return $this->hasMany('App\Impulsa');
    }

    public function valeros()
    {
        return $this->hasMany('App\Valero');
    }
    protected $fillable = [
        'id', 'razon_social', 'rfc', 'nombre_terminal', 'status', 'codigo_postal', 'tipo_de_vialidad', 'nombre_de_vialidad', 'n_exterior', 'n_interior',
    ];
}
