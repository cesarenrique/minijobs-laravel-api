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
        Schema::create('pago_limitacions', function (Blueprint $table) {
            $table->id();
            $table->integer('dia_corte');
            $table->unsignedBigInteger('pago_suscripcion_id')->unique();
            $table->foreign('pago_suscripcion_id')->references('id')->on('pago_suscripcions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago_limitacions');
    }
};
