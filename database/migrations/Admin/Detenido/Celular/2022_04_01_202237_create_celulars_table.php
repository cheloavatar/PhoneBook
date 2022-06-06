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
        Schema::create('celulars', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('nota');
            $table->bigInteger('telefono');
            $table->bigInteger('imei');
            $table->string('foto');
            $table->string('color');
            $table->softDeletes();
            $table->unSignedbigInteger('detenido_id');
            $table->unSignedbigInteger('elemento_creo');
            $table->unSignedbigInteger('elemento_edito');
            $table->timestamps();
            $table->foreign('elemento_creo')->references('id')->on('users');
            $table->foreign('elemento_edito')->references('id')->on('users');
            $table->foreign('detenido_id')->references('id')->on('detenidos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celulars');
    }
};
