<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valeros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('terminal_id');
            $table->double('precio_regular', 12, 3)->nullable();
            $table->double('precio_premium', 12, 3)->nullable();
            $table->double('precio_disel', 12, 3)->nullable();
            $table->double('costo_envio', 12, 3)->nullable();
            $table->timestamps();

             $table->foreign('terminal_id')->references('id')->on('terminals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valeros');
    }
}
