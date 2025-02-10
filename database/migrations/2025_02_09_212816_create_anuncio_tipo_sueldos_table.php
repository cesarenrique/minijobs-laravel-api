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
        Schema::create('anuncio_tipo_sueldos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_sueldo_id');
            $table->unsignedBigInteger('anuncio_id');
            $table->foreign('tipo_sueldo_id')->references('id')->on('tipo_sueldos');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio_tipo_sueldos');
    }
};
