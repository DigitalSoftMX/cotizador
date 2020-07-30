<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social');
            $table->string('rfc');
            $table->string('cre')->nullable();
            $table->string('terminal')->nullable();
            $table->double('saldo', 12, 2);
            $table->string('nombre_sucursal')->nullable();
            $table->integer('linea_credito');
            $table->double('credito', 12, 2);
            $table->double('credito_usado', 12, 2);
            $table->integer('dias_credito');
            $table->integer('retencion');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('terminals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacions');
    }
}
