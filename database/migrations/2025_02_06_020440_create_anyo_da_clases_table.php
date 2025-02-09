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
        Schema::create('anyo_da_clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anyo_academicos_id');
            $table->unsignedBigInteger('profesor_id');
            $table->unique(['profesor_id','anyo_academicos_id']);
            $table->foreign('profesor_id')->references('id')->on('profesors');
            $table->foreign('anyo_academicos_id')->references('id')->on('anyo_academicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anyo_da_clases');
    }
};
