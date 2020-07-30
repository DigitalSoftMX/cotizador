<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('fits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('terminal_id');
            $table->double('policom', 12, 3)->nullable();
            $table->double('impulsa', 12, 3)->nullable();
            $table->double('comision', 12, 3)->nullable();
            $table->double('regular_fit', 12, 3)->nullable();
            $table->double('premium_fit', 12, 3)->nullable();
            $table->double('disel_fit', 12, 3)->nullable();
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
        Schema::dropIfExists('fits');
    }
}
