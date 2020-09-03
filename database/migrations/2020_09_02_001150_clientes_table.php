<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('tipo');
            $table->string('bandera_blanca')->nullable();
            $table->string('numero_estacion')->nullable();
            $table->string('carta_intencion')->nullable();
            $table->string('carta_confidencialidad')->nullable();
            $table->string('propuesta')->nullable();
            $table->string('contrato_formal')->nullable();
            $table->string('solicitud_documentacion1')->nullable();
            $table->string('solicitud_documentacion2')->nullable();
            $table->string('solicitud_documentacion3')->nullable();
            $table->string('solicitud_documentacion4')->nullable();
            $table->string('solicitud_documentacion5')->nullable();
            $table->string('value_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
