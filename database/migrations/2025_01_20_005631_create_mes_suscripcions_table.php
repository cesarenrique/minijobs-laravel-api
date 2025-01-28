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
        Schema::create('mes_suscripcions', function (Blueprint $table) {
            $table->id();
            $table->Integer('mes');
            $table->unsignedBigInteger('anyo_id');
            $table->foreign('anyo_id')->references('id')->on('anyo_suscripcions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mes_suscripcions');
    }
};
