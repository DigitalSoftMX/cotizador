<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social');
            $table->string('rfc')->nullable();
            $table->string('nombre_terminal')->nullable();
            $table->boolean('status');
            $table->string('codigo_postal')->nullable();
            $table->string('tipo_de_vialidad')->nullable();
            $table->string('nombre_de_vialidad')->nullable();
            $table->string('n_exterior')->nullable();
            $table->string('n_interior')->nullable();
            $table->string('nombre_colonia')->nullable();
            $table->string('nombre_localidad')->nullable();
            $table->string('nombre_municipio_o_demarcacion_territorial')->nullable();
            $table->string('nombre_entidad_federativa')->nullable();
            $table->string('entre_calle')->nullable();
            $table->string('y_calle')->nullable();
            //$table->unsignedBigInteger('terminal_id')->nullable();
            $table->timestamps();

            //$table->foreign('terminal_id')->references('id')->on('fits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals');
    }
}
