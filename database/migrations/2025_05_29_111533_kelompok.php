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
        Schema::create('kelompok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user_1')->nullable();
            $table->unsignedBigInteger('id_user_2')->nullable();
            $table->unsignedBigInteger('id_user_3')->nullable();
            $table->unsignedBigInteger('id_user_4')->nullable();
            $table->unsignedBigInteger('id_user_5')->nullable();
            $table->timestamps();

            $table->foreign('id_user_1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_3')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_4')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user_5')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok');
    }
};
