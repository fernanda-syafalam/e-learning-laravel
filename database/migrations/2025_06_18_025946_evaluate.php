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
        Schema::create('evaluate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nilai');
            $table->text('message');
            $table->timestamps();

            $table->foreign('id_nilai')->references('id')->on('nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluate');
    }
};
