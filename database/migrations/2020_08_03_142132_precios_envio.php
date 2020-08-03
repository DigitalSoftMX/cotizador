<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreciosEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_envios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('desgaste_unidad', 12, 3)->nullable();
            $table->double('costo_operador', 12, 3)->nullable();
            $table->double('consumo_diesel', 12, 3)->nullable();
            $table->double('seguro_unidad', 12, 3)->nullable();
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
