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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->Integer('estado'); //publicado o no / expirado
            $table->date('inicio');
            $table->unsignedBigInteger('cargo_empresa_id');
            $table->foreign('cargo_empresa_id')->references('id')->on('cargo_empresas');
            $table->unsignedBigInteger('reclutador_id');
            $table->foreign('reclutador_id')->references('id')->on('reclutadors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
