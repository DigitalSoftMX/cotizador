<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clientes';

    protected $fillable = [
        'id', 'nombre', 'direccion', 'telefono', 'email', 'tipo', 'estado', 'bandera_blanca', 'numero_estacion',
        'carta_intencion', 'convenio_confidencialidad', 'margen_garantizado',
        'contrato_comodato', 'contrato_suministro', 'carta_bienvenida', 'solicitud_documentacion', 'propuestas',
        'value_key'
    ];

}
