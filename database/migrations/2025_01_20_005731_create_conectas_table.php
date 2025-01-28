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
        Schema::create('conectas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_principal_id');
            $table->unsignedBigInteger('user_otra_id');
            $table->foreign('user_principal_id')->references('id')->on('users');
            $table->unique('user_principal_id','user_otra_id');
            $table->foreign('user_otra_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conectas');
    }
};
