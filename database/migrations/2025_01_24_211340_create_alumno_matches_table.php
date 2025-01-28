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
        Schema::create('alumno_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_tiene_id');
            $table->unsignedBigInteger('anuncio_id');
            $table->unique('alumno_tiene_id','anuncio_id');
            $table->foreign('alumno_tiene_id')->references('id')->on('alumno_tienes');
            $table->foreign('anuncio_id')->references('id')->on('anuncios'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_matches');
    }
};
