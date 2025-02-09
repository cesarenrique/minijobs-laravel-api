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
        Schema::create('carrera_centros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('carrera_id');
            $table->unique(['centro_id','carrera_id']);
            $table->foreign('centro_id')->references('id')->on('centros');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_centros');
    }
};
