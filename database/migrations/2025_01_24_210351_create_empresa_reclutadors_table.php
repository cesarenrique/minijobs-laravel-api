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
        Schema::create('empresa_reclutadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reclutador_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unique(['reclutador_id','empresa_id']);
            $table->foreign('reclutador_id')->references('id')->on('reclutadors');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa_reclutadors');
    }
};
