<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nivel_1')->nullable();
            $table->string('nivel_2')->nullable();
            $table->string('nivel_3')->nullable();
            $table->string('nivel_4')->nullable();
            $table->string('nivel_5')->nullable();
            $table->string('nivel_6')->nullable();
            $table->string('nivel_7')->nullable();
            $table->string('nivel_8')->nullable();
            $table->string('nivel_9')->nullable();
            $table->string('nivel_10')->nullable();
            $table->string('producto')->nullable();
            $table->string('nombre')->nullable();
            $table->boolean('vigencia_now')->nullable();
            $table->boolean('vigencia_old')->nullable();
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
        Schema::dropIfExists('discounts');
    }
}
