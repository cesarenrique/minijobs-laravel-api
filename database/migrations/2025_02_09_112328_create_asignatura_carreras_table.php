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
        Schema::create('asignatura_carreras', function (Blueprint $table) {
            $table->id();
            $table->integer('bloque');
            $table->string('tipo');
            $table->unsignedBigInteger('centro_id')->nullable();
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedBigInteger('carrera_id');
            $table->unique(['asignatura_id','carrera_id']);
            $table->foreign('centro_id')->references('id')->on('centros');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura_carreras');
    }
};
