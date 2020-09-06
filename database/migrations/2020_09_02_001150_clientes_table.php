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
            $table->string('convenio_confidencialidad')->nullable();
            $table->string('margen_garantizado')->nullable();
            $table->string('contrato_comodato')->nullable();
            $table->string('contrato_suministro')->nullable();
            $table->string('carta_bienvenida')->nullable();

            $table->json('solicitud_documentacion')->nullable();
            $table->json('propuestas')->nullable();
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
