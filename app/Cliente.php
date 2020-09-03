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
        'id', 'nombre', 'direccion', 'telefono', 'email', 'tipo', 'bandera_blanca', 'numero_estacion',
        'carta_intencion', 'carta_confidencialidad', 'propuesta', 'contrato_formal', 'solicitud_documentacion1',
        'solicitud_documentacion2', 'solicitud_documentacion3', 'solicitud_documentacion4', 'solicitud_documentacion5',
        'value_key'
    ];

}
