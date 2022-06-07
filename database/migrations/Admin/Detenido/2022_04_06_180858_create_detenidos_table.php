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
        Schema::create('detenidos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('nombre')->unique();
            $table->string('alias')->nullable();
            $table->string('origen');
            $table->string('foto');
            $table->unSignedbigInteger('elemento_creo');
            $table->unSignedbigInteger('elemento_edito');
            $table->date('fecha_nacimiento');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('elemento_creo')
            ->references('id')
            ->on('users');
            $table->foreign('elemento_edito')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detenidos');
    }
};
