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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('NIF');
            $table->string('logo');
            $table->string('nombre');
            $table->string('email');
            $table->string('tamanyo');
            $table->string('verificada')->nullable();
            $table->unsignedBigInteger('encargado_id');
            $table->foreign('encargado_id')->references('id')->on('encargados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
