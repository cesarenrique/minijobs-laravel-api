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
        Schema::create('experiencia_academicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_tiene_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->unique('alumno_tiene_id','asignatura_id');
            $table->foreign('alumno_tiene_id')->references('id')->on('alumno_tienes');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_academicas');
    }
};
