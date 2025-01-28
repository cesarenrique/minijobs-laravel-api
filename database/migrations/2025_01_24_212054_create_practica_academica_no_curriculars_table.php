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
        Schema::create('practica_academica_no_curriculars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practica_academica_id')->unique;
            $table->foreign('practica_academica_id')->references('id')->on('practica_academicas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practica_academica_no_curriculars');
    }
};
