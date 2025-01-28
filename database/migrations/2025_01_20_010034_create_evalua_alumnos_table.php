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
        Schema::create('evalua_alumnos', function (Blueprint $table) {
            $table->id();
            $table->float('nota');
            $table->Integer('numero');
            $table->unsignedBigInteger('estudia_id');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->unique('evaluacion_id','asignatura_id');
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas'); 
            $table->foreign('estudia_id')->references('id')->on('estudias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evalua_alumnos');
    }
};
