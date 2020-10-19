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
        'id', 'estacion_numero', 'marca', 'numero_dispensarios', 'gasolina_verde', 'gasolina_roja', 'diesel', 'nombre', 'encargado', 'estado', 'telefono', 'pagina_web', 'rfc', 'direccion',
        'tipo', 'email', 'estatus', 'bandera_blanca', 'numero_estacion', 'carta_de_intencion',
        'convenio_de_confidencialidad', 'margen_garantizado', 'solicitud_de_documentos',
        'ine', 'acta_constitutiva', 'documento_rfc', 'poder_notarial', 'constancia_de_situacion_fiscal',
        'comprobante_de_domicilio', 'propuestas', 'contrato_comodato', 'contrato_de_suministro',
        'carta_bienvenida', 'permiso_cree', 'bitacora', 'bitacora_cliente', 'value_key'
    ];

}
