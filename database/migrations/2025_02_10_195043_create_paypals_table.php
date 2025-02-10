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
        Schema::create('paypals', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('forma_pago_id')->unique();
            $table->foreign('forma_pago_id')->references('id')->on('forma_pagos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypals');
    }
};
