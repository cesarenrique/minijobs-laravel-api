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
        Schema::create('da_clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anyo_da_clases_id');
            $table->unsignedBigInteger('asignaturas_id');
            $table->unique(['anyo_da_clases_id','asignaturas_id']);
            $table->foreign('anyo_da_clases_id')->references('id')->on('anyo_da_clases');
            $table->foreign('asignaturas_id')->references('id')->on('asignaturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('da_clases');
    }
};
