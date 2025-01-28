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
        Schema::create('experiencia_empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_tiene_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('cargo_id');
            $table->unique('alumno_tiene_id','cargo_id');
            $table->foreign('alumno_tiene_id')->references('id')->on('alumno_tienes');
            $table->foreign('empresa_id')->references('id')->on('empresas'); 
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_empresas');
    }
};
