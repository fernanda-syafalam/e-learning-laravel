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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id(); // ID Materi
            $table->unsignedBigInteger('id_guru'); // ID guru (relasi)
            $table->text('judul'); // Judul materi
            $table->longText('deskripsi')->nullable(); // Deskripsi materi
            $table->datetime('deadline');
            $table->unsignedBigInteger('id_file')->nullable();
            $table->timestamps();

            // Foreign key ke tabel guru (tabel users)
            $table->foreign('id_file')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
