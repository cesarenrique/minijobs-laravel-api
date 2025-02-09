<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->float('puntuacion_personal');
            $table->float('puntuacion_academica');
            $table->float('puntuacion_experiencia');
            $table->float('puntuacion_mentor');
            $table->float('test_skills');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('anuncio_id');
            $table->unique(['alumno_id','anuncio_id']);
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
