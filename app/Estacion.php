<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{


    public function users(){
        return $this->belongsToMany('App\User');
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'razon_social', 'rfc', 'cre', 'terminal', 'saldo', 'nombre_sucursal', 'linea_credito', 'credito', 'credito_usado', 'dias_credito', 'retencion' ,'status',
    ];
}
