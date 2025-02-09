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
        Schema::create('empresa_cargo_experiencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_experiencia_id');
            $table->unsignedBigInteger('cargo_experiencia_id');
            $table->foreign('empresa_experiencia_id')->references('id')->on('empresa_experiencias');
            $table->foreign('cargo_experiencia_id')->references('id')->on('cargo_experiencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa_cargo_experiencias');
    }
};
