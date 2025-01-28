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
        Schema::create('profesor_validas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_tiene_id');
            $table->unsignedBigInteger('profesor_id');
            $table->unique('alumno_tiene_id','profesor_id');
            $table->foreign('alumno_tiene_id')->references('id')->on('alumno_tienes');
            $table->foreign('profesor_id')->references('id')->on('profesors'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_validas');
    }
};
