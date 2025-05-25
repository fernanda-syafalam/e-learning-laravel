<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id(); // ID Materi
            $table->dateTime('tanggal_dibuat')->default(DB::raw('CURRENT_TIMESTAMP')); // Tanggal dibuat
            $table->unsignedBigInteger('id_guru'); // ID guru (relasi)
            $table->text('judul'); // Judul materi
            $table->longText('deskripsi'); // Deskripsi materi
            $table->timestamps();

            // Foreign key ke tabel guru (tabel users)
            $table->foreign('id_guru')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
