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
        Schema::create('user_limitacions', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_limite_administrador')->nullable();
            $table->string('fecha_limite_encargado')->nullable();
            $table->string('fecha_limite_reclutador')->nullable();
            $table->string('fecha_limite_profesor')->nullable();
            $table->string('fecha_limite_alumno')->nullable();
            $table->string('fecha_limite_mentor')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_limitacions');
    }
};
