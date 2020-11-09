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
            $table->string('estacion_numero')->nullable();
            $table->string('marca')->nullable();
            $table->integer('numero_dispensarios')->nullable();
            $table->enum('gasolina_verde', ['FALSE','TRUE']);
            $table->enum('gasolina_roja', ['FALSE','TRUE']);
            $table->enum('diesel', ['FALSE','TRUE']);
            $table->string('nombre');
            $table->string('encargado');
            $table->string('estado')->nullable();;
            $table->string('telefono');
            $table->string('pagina_web')->nullable();
            $table->string('rfc')->nullable();
            $table->string('direccion')->nullable();
            $table->string('tipo')->nullable();
            $table->string('email');
            $table->enum('estatus', ['prospecto', 'cliente']);
            $table->string('bandera_blanca')->nullable();
            $table->string('numero_estacion')->nullable();

            $table->json('carta_de_intencion')->nullable();

            $table->json('convenio_de_confidencialidad')->nullable();

            $table->json('margen_garantizado')->nullable();

            $table->json('solicitud_de_documentos')->nullable();
            $table->json('ine')->nullable();
            $table->json('acta_constitutiva')->nullable();
            $table->json('documento_rfc')->nullable();
            $table->json('poder_notarial')->nullable();
            $table->json('constancia_de_situacion_fiscal')->nullable();
            $table->json('comprobante_de_domicilio')->nullable();

            $table->json('propuestas')->nullable();

            $table->json('contrato_comodato')->nullable();
            $table->json('contrato_de_suministro')->nullable();
            $table->json('carta_bienvenida')->nullable();
            $table->json('permiso_cree')->nullable();

            $table->json('bitacora')->nullable();
            $table->json('bitacora_cliente')->nullable();

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
