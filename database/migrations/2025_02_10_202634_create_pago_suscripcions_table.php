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
        Schema::create('pago_suscripcions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suscripcion_id')->unique();
            $table->unsignedBigInteger('articulo_id')->unique();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('suscripcion_id')->references('id')->on('suscripcions');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago_suscripcions');
    }
};
