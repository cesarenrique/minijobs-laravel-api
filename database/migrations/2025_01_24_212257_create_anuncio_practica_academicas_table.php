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
        Schema::create('anuncio_practica_academicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('opcion_practica_id');
            $table->unique('anuncio_id','opcion_practica_id');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->foreign('opcion_practica_id')->references('id')->on('opcion_practicas'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio_practica_academicas');
    }
};
