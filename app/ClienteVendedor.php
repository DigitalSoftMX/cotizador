<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteVendedor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cliente_vendedor';

    protected $fillable = [
        'id', 'user_id', 'cliente_id', 'dia_termino', 'status'
    ];
}
