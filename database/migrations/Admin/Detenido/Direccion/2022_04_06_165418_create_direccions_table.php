<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();

            $table->string('calle');
            $table->integer('numero');
            $table->string('colonia');
            $table->integer('cp');
            $table->string('estado');
            $table->unSignedbigInteger('detenido_id');
            $table->unSignedbigInteger('municipio_id');
            $table->timestamps();
            $table->foreign('detenido_id')->references('id')->on('detenidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
};
