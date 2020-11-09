<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendedorUnidadNegocio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendedor_unidad_negocio';

    protected $fillable = [
        'id','user_id','unidades_negocio'
    ];
}
