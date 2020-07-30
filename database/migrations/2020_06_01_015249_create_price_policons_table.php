<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricePoliconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_policons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('policon_id');
            $table->double('precio_regular', 12, 3)->nullable();
            $table->double('precio_premium', 12, 3)->nullable();
            $table->double('precio_disel', 12, 3)->nullable();
            $table->timestamps();

            $table->foreign('policon_id')->references('id')->on('policons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_policons');
    }
}
