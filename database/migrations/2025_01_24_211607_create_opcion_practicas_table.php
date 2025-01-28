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
        Schema::create('opcion_practicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('practica_academica_id');
            $table->unique('alumno_id','carrera_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('carrera_id')->references('id')->on('carreras'); 
            $table->foreign('practica_academica_id')->references('id')->on('practica_academicas'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opcion_practicas');
    }
};
