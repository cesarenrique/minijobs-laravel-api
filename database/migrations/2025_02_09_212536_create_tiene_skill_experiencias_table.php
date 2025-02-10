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
        Schema::create('tiene_skill_experiencias', function (Blueprint $table) {
            $table->id();
            $table->integer('validacion'); //1 sin validacion - 2 Validadcion Academica - 3 Validacion Empresa - 4 Validacion mentor - 5 Validacion test
            $table->integer('tiempo_meses');
            $table->integer('nivel');
            $table->string('descripcion');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('asignatura_id')->nullable();
            $table->unsignedBigInteger('empresa_cargo_experiencia_id')->nullable();
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesors');
            $table->foreign('empresa_cargo_experiencia_id')->references('id')->on('cargo_experiencias');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('mentor_id')->references('id')->on('mentors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiene_skill_experiencias');
    }
};
