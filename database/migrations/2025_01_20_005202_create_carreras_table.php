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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('tipo_rama_carrera_id');
            $table->foreign('tipo_rama_carrera_id')->references('id')->on('tipo_rama_carreras');
            $table->unsignedBigInteger('anyo_plan_academico_id');
            $table->foreign('anyo_plan_academico_id')->references('id')->on('anyo_plan_academicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
