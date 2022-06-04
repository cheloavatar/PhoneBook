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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->unSignedbigInteger('detenido_id');
            $table->unSignedbigInteger('celular_id');
            $table->timestamps();
            $table->foreign('detenido_id')->references('id')->on('detenidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('celular_id')->references('id')->on('celulars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
