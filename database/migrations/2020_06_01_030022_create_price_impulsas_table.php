<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceImpulsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_impulsas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('impulsa_id');
            $table->double('precio_regular', 12, 3)->nullable();
            $table->double('precio_premium', 12, 3)->nullable();
            $table->double('precio_disel', 12, 3)->nullable();
            $table->timestamps();

            $table->foreign('impulsa_id')->references('id')->on('impulsas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_impulsas');
    }
}
